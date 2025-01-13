module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./public/assets/**/*.js",
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        boxShadow: {
          inner: "0px 1.5px 0px 0px #04165D",
          bottom: "0px 5px 30px 0px rgba(50, 50, 50, 0.04)",
        },
        extend: {
            colors: {
                primary: "#0F1F3D",
                secondary: '#C6C6C6',
                borderColor: "#F4F4F4",
            },
            screens: {
                sm: "640px", // Small screens (default in Tailwind)
                md: "768px", // Medium screens (default in Tailwind)
                lg: "1024px", // Large screens (default in Tailwind)
                xl: "1280px", // Extra large screens (default in Tailwind)
                xxl: "1536px", // 2X large screens (default in Tailwind)
            },
            boxShadow: {
                'feature-card': '0 4px 30px 0 rgba(0, 0, 0, 0.05)', // x, y, blur, spread, color
            }
        },
    },
    plugins: [],
};
