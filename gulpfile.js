// Packages
const gulp = require('gulp'),
    sass = require("gulp-sass")(require("node-sass")),
    uglify = require('gulp-uglify-es').default,
    watch = require('gulp-watch'),
    webp = require('gulp-webp'),
    postcss = require('gulp-postcss'),
    tailwind = require('tailwindcss'),
    postcssImport = require('postcss-import'),
    clean = require('gulp-clean');

const path = "./dist/";


gulp.task('clean', function () {
    return gulp.src('dist', {read: false}).pipe(clean());
});

gulp.task('html', () => {
    return gulp.src('./src/*.php')
        .pipe(gulp.dest(path))
});

gulp.task('styles', function () {
    return gulp.src('src/sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(postcss([
            postcssImport,
            tailwind]))
        .pipe(gulp.dest(path))
});

gulp.task('js', function () {
    return gulp.src('src/**/*.js')
        .pipe(uglify({
            compress: {
                global_defs: {
                    DEBUG: process.env.DEBUG || false
                }
            }
        }))
        .pipe(gulp.dest(path))
});

gulp.task('json', function () {
    return gulp.src('src/**/*.json')
        .pipe(gulp.dest(path))
});

gulp.task('images', function () {
    return gulp.src('src/img/*')
        .pipe(webp({
            quality: 80,
          }))
        .pipe(gulp.dest(path + 'img'))
});

// Watch tasks
gulp.task('watch', function () {
    gulp.watch('src/**/*.php', { usePolling: false }, gulp.series('html'));
    gulp.watch('src/**/*.php', { usePolling: false }, gulp.series('styles')); // for tailwind styles after html changes
    gulp.watch('src/**/*.scss', { usePolling: false }, gulp.series('styles'));
    gulp.watch('src/**/*.js', { usePolling: false }, gulp.series('js'));
    gulp.watch('src/**/*.json', { usePolling: false }, gulp.series('json'));
    gulp.watch('src/img/*', { usePolling: false }, gulp.series('images'));
});


// Run tasks
gulp.task('default', gulp.series(gulp.parallel(['watch', 'html', 'styles', 'js', 'json', 'images']), function a() {}));
