/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./public/client/html/*.html",
    ],
    theme: {
      extend: {
        spacing: {
          '75': '19rem',  
        },
        colors: {
          main: {
            50: "#FFF9F5",
            100: "#FBB03B",
            200: "#FF7A17",
            300: "#F88312",
            400: "#0B1742",
          },
          pink: "#FB43FF",
          purple: "#8512F8",
          white: "#FFFDF6",
          'white-2': "rgba(193, 113, 39, 0.1)",
          'black-2': "rgba(0, 0, 0, 0.5)",
          "pale-yellow": "rgba(255, 168, 105, 0.15)",
          "blue-grey": "#49586C",
        },
        fontFamily: {
          montserrat: ["Montserrat", 'sans-serif'],
          poppins: ["Poppins", 'sans-serif'],
          inter: ["Inter", "sans-serif"],
        },
        boxShadow :{
          'custom' : '0px 8px 20px 0px rgba(255, 168, 105, 0.26)',
        },
        screens: {
          "4xl": "1920px",
        },
        dropShadow: {
          "header-shadow": "4px 0px 42px rgba(255, 168, 105, 0.25)",
        },
        backgroundImage: {
          'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
        }
      },
    },
    plugins: [],
  }
