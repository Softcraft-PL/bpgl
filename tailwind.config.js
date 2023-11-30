module.exports = {
  content: ["./**/*.php"],
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#fff',
      'black': '#2A2A2A',
      'black-light': '#5e5e5e',
      'grey': '#F2F3F2',
      'blue': '#0952D2',
      'yellow': '#FDC10B',
      'red': '#F01414',
      'orange': '#f3701d',
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
      'roboto': ['Roboto'],
      'roboto-slab': ['Roboto Slab']
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
      },
    },
  },
  plugins: [],
}