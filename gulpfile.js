var gulp = require('gulp');
var gutil = require('gulp-util');
var bower = require('gulp-bower');
var bowerFiles = require('gulp-bower-files');
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var sass = require('gulp-ruby-sass');
var autoprefix = require('gulp-autoprefixer');
var coffee = require('gulp-coffee');
var minifycss = require('gulp-minify-css');
var rename = require('gulp-rename');
var filter = require('gulp-filter');
var clean = require('gulp-clean');
var sourcemaps = require('gulp-sourcemaps');

var paths = {
	build_folder: 'app/assets/build',
	build: {
		js: 'app/assets/build/js',
		css: 'app/assets/build/css'
	},
	public_folder: 'public/assets',
	public: {
		js: 'public/assets/js',
		css: 'public/assets/css',
		fonts: 'public/assets/fonts'
	},
	app: {
		js: 'app/assets/js',
		css: 'app/assets/css'
	}
};

gulp.task('bower', function() {
	return bower();
});

gulp.task('concat-vendor-js', ['bower'], function() {
	return bowerFiles()
		.pipe(filter('**/*.js'))
		.pipe(concat('vendor.js'))
		.pipe(gulp.dest(paths.build.js));
});

gulp.task('concat-vendor-css', ['bower'], function() {
	return bowerFiles()
		.pipe(filter('**/*.css'))
		.pipe(concat('vendor.css'))
		.pipe(gulp.dest(paths.build.css));
});

gulp.task('concat-app-js', function() {
	return gulp.src(paths.app.js + '/**/*.js')
		.pipe(sourcemaps.init())
			.pipe(concat('app.js'))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(paths.build.js));;
});

gulp.task('concat-app-css', function() {
	return gulp.src(paths.app.css + '/**/*.css')
		.pipe(sourcemaps.init())
			.pipe(autoprefix('last 10 version'))
			.pipe(concat('app.css'))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(paths.build.css));
});

gulp.task('concat-js', ['concat-vendor-js', 'concat-app-js'], function() {
	return gulp.src([
		paths.build.js + '/vendor.js',
		paths.build.js + '/app.js'
	])
		.pipe(concat('bundle.js'))
		.pipe(gulp.dest(paths.public.js));
});

gulp.task('concat-css', ['concat-vendor-css', 'concat-app-css'], function() {
	return gulp.src([
		paths.build.css + '/vendor.css',
		paths.build.css + '/app.css'
	])
		.pipe(concat('bundle.css'))
//		.pipe(minifycss())
		.pipe(gulp.dest(paths.public.css));
});

gulp.task('concat', ['concat-js', 'concat-css']);


gulp.task('fonts', ['bower'], function() {
	gulp.src('bower_components/bootstrap/dist/fonts/*')
		.pipe(gulp.dest(paths.public.fonts));
});

gulp.task('clean', function() {
	return gulp.src(paths.build_folder, {read: false})
		.pipe(clean());
});

gulp.task('clean:public', function() {
	return gulp.src(paths.public_folder, {read: false})
		.pipe(clean());
});

gulp.task('build', ['concat', 'fonts']);

gulp.task('watch', function() {
	gulp.watch(paths.app.js + '/**/*.js', ['concat-js']);
	gulp.watch(paths.app.css + '/**/*.css', ['concat-css']);
});
