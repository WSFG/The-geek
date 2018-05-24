var gulp = require('gulp');
var importCss = require('gulp-import-css');

gulp.task('default', function () {
    gulp.src('resources/assets/css/Default/main.css')
        .pipe(importCss())
        .pipe(gulp.dest('public/css/Default'));

    gulp.src('resources/assets/css/Newspaper/main.css')
        .pipe(importCss())
        .pipe(gulp.dest('public/css/Newspaper'));
});

gulp.watch(['resources/assets/css/Default/*.css', 'resources/assets/css/Newspaper/*.css'], ['default']);