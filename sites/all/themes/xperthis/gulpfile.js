var gulp       = require('gulp');
var less       = require('gulp-less');
var watch      = require('gulp-watch');
var livereload = require('gulp-livereload');
 
gulp.task('less', function () {
  gulp.src('less/style.less')
    .pipe(less())
    .pipe(gulp.dest('css'))
    .pipe(livereload());
});
 
gulp.task('watch', function() {
  livereload.listen();
  gulp.watch('less/*.less', ['less']);
});
