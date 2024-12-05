/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],

  theme: {
    extend: {
      fontFamily: {
        EB_Garamond: "'EB Garamond', serif",
        Lato: "'lato', san-serif",
      },

      screens: {
        sm: "540px",
        md: "769px",
        lg: "1025px",
        xl: "1281px",
        "2xl": "1537px",
        "3xl": "1681px",
      },

      colors: {
        primary: "#0C0C0C",
        Intermediate: "#101010",
        tertiary: "#3F3F3F",
        Quaternary: "#5F498A",
        secondary: "#FFEDE7",
        "light-green": "#1C3C19",
        "bg-all": "#F5F5F5",
        Pink: "#F9B2C4",
        pinkL: "#EA6989",
        fashion: "#F8F0FB",
        Black: "#000000",
        "light-pink": "#FFEDE7",
        "footer-pink": "#F9DED3",
        "footer-blue": "#D1DEE7",
        "footer-green": "#D2D3A9",
      },

      lineClamp: {
        1: "1",
        2: "2",
        3: "3",
        4: "4",
        5: "5",
        6: "6",
        7: "7",
        8: "8",
        9: "9",
        10: "10",
        11: "11",
        12: "12",
        13: "13",
        14: "14",
        15: "15",
        16: "16",
        17: "17",
        18: "18",
        19: "19",
        20: "20",
      },
    },
  },

  plugins: [require("daisyui")],

  daisyui: {
    themes: ["light", "cupcake"],
    themes: false,
    darkTheme: "class",
    base: true,
    styled: true,
    utils: true,
    rtl: false,
    prefix: "",
    logs: true,
  },
};
