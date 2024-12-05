/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  theme: {
    extend: {
      zIndex: {
        0: "0",
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

      colors: {
        primary: "#ED1B1B",
        secondary: "#101010",
        business: "#864DFF",
        lifestyle: "#C3DD1E",
        social: "#FF4444",
        entertainment: "#A773C3",
        health: "#FFD400",
        technology: "#34D2AC",
        education: "#FF9090",
        paragraph: "#686868",
      },
    },

    screens: {
      sm: "540px",
      md: "769px",
      lg: "1025px",
      xl: "1281px",
      "2xl": "1537px",
      "3xl": "1681px",
    },

    fontFamily: {
      Anton: ["Anton", "sans-serif"],
      Chai: ["Chai", "sans-serif"],
      Dekko: ["Dekko", "cursive"],
    },
  },

  plugins: [require("daisyui")],

  daisyui: {
    themes: false,
    darkTheme: "light",
    base: true,
    styled: true,
    utils: true,
    rtl: false,
    prefix: "",
    logs: true,
    themes: ["light", "cupcake"],
  },
};
