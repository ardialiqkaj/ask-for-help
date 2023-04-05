/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: {
    relative: true,
    files: [
      "./modules/*.php",
      "./index.php",
      "./footer.php",
      "./header.php",
      "./sidebar.php",
      "./page-right-sidebar.php",
      "./page-register.php",
      "./page-login.php",
      "./single-questions.php",
      "./all-categories-widget.php",
      "./inc/walker.php",
      "./my-questions.php",
      "./add-modal.php",
      "./functions.php",
      "./like-dislike.php",
      "./my-answers.php",
      "./filter-solved-notsolved.php",
      "./search.php",
      "./modals/*.php",
      "./filters.php",
      "./partials/*.php",
    ],
  },
  theme: {
    extend: {
      container: {
        screens: {
          xs: "100%",
          sm: "100%",
          md: "100%",
          lg: "1024px",
          xl: "1280px",
          "2xl": "1600px",
        },
      },
      backgroundImage: {
        "split-white-blue":
          "linear-gradient(to bottom, #ffffff 50% , #4767c9 50%);",
        "split-gray": "linear-gradient(to bottom, #181f2a 50% , #0b1523 50%);",
      },

      fontFamily: {
        display: ["Montserrat", "sans-serif"],
      },
    },
  },
  plugins: [],
};
