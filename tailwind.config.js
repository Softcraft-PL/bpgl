module.exports = {
  content: ["./**/*.php"],
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#fff',
      'black': '#2A2A2A',
      'grey': '#F2F3F2',
      'blue': '#0952D2',
      'yellow': '#FDC10B',
      'red': '#F01414',
      'primary': '#f3701d',
      'secondary': '#FDC10B',
      'text-color': '#2A2A2A'
    },
    screens: {
      'sm': '576px',
      'md': '768px',
      'lg': '992px',
      'xl': '1200px',
      '2xl': '1480px',
    },
    fontFamily: {
      'lato': ['Lato'],
    },
    extend: {
      /*gap: {
        '30': '1.875rem',
      }*/
      /*fontFamily: {
        'sans': ['Source Sans Pro', ...defaultTheme.fontFamily.sans],
      },*/
      backgroundImage: {
        'bg1': "url('/wp-content/themes/pma/img/bg1.webp')",
        'bg2': "url('/wp-content/themes/pma/img/bg2.webp')",
        'bg-blue': "url('/wp-content/themes/pma/img/bg-blue.webp')",
        'bg-map': "url('/wp-content/themes/pma/img/bg-map.webp')",
        'bg-footer': "url('/wp-content/themes/pma/img/bg-footer.webp')"
      },
    },
  },
  plugins: [],
}