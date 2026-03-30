export default{
    plugins: {
        '@tailwindcss/postcss': {},
        autoprefixer: {
            overrideBrowserslist: ['> 0.01%', 'last 10 versions', 'not dead'],
        }
    },
};