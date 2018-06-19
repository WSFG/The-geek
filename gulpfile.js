var gulp = require('gulp');
var browserify = require('browserify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');
var gutil = require('gulp-util');
var importCss = require('gulp-import-css');

gulp.task('default', function () {
    gulp.src('resources/assets/css/Default/main.css')
        .pipe(importCss())
        .pipe(gulp.dest('public/css/Default'));

    gulp.src('resources/assets/css/Newspaper/main.css')
        .pipe(importCss())
        .pipe(gulp.dest('public/css/Newspaper'));
});

// gulp.watch(['resources/assets/css/Default/*.css', 'resources/assets/css/Newspaper/*.css'], ['default']);

// Lets bring es6 to es5 with this.
// Babel - converts ES6 code to ES5 - however it doesn't handle imports.
// Browserify - crawls your code for dependencies and packages them up
// into one file. can have plugins.
// Babelify - a babel plugin for browserify, to make browserify
// handle es6 including imports.
gulp.task('es6', function() {
    browserify({
        entries: 'resources/assets/js/app.js',
        debug: true
    })
        .transform(babelify)
        .on('error',gutil.log)
        .bundle()
        .on('error',gutil.log)
        .pipe(source('bundle.js'))
        .pipe(gulp.dest('/public/js/app.js'));
});