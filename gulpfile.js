'use strict';

// Plugins.
var gulp = require('gulp'),
  sass = require('gulp-sass'),
  sourcemaps = require('gulp-sourcemaps');

// Paths.
var source = 'web/assets/styles/sass/*.scss',
  destination = 'web/assets/styles/css/';

/**
 * Don't change anything below this line.
 */

// Compile sass to css.
gulp.task('sass', function () {
  return gulp.src(source)
    .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest(destination));
});

// Watch for file changes.
gulp.task('watch', function () {
  gulp.watch(source, ['sass']);
});

// Compile sass to css for dev.
gulp.task('sass:dev', function () {
  return gulp.src(source)
    // Initializes sourcemaps.
    .pipe(sourcemaps.init())
    .pipe(sass.sync().on('error', sass.logError))
    // Writes sourcemaps into the CSS file.
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(destination));
});

// Watch for file changes. Calling sass:dev.
gulp.task('watch:dev', function () {
  gulp.watch(source, ['sass:dev']);
});

// Default task.
gulp.task('default', ['watch']);
