module.exports = {
	// The order of plugins matters.
	plugins: [
		// https://tailwindcss.com/docs/using-with-preprocessors#build-time-imports
		require('postcss-import'),
		// require('tailwindcss'),
		// https://tailwindcss.com/docs/using-with-preprocessors#nesting
		require('postcss-nested'),
		require('autoprefixer'),
	]
}