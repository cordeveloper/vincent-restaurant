var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');

gulp.task('sass', function () {
    return gulp.src('./assets/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(autoprefixer({
            browsers: ['last 10 versions'],
            cascade: false
        }))
      .pipe(sass().on('error', sass.logError))
      .pipe(sourcemaps.write('../maps'))
      .pipe(gulp.dest('./assets/css'));
});

gulp.task('default', ['sass'], function(){
    gulp.watch('./assets/scss/**/*.scss', ['sass']);
});