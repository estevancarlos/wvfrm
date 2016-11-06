"use strict";

const gulp = require('gulp'),
      babel = require('gulp-babel'),
      sass = require('gulp-sass'),
      compass = require('gulp-compass'),
      concat = require('gulp-concat'),
      browsersync = require('browser-sync'),
      reload = browsersync.reload,
      gulpPostcss = require('gulp-postcss'),
      cssdeclsort = require('css-declaration-sorter'),
      imagemin = require('gulp-imagemin'),
      browserify = require('browserify'),
      merge = require('merge-stream');

// Bootstrap-Sass Gulp Bower
// https://www.codementor.io/development-process/tutorial/create-custom-bootstrap-build-with-scss

const config = {
    themeDir: '../wvfrm_theme'
}

gulp.task('compass', () => {
    return gulp.src('./assets/sass/*.scss')
        .pipe(compass({
            config_file: 'config.rb',
            css: config.themeDir,
            sass: './assets/sass'
        }))
        .pipe(gulpPostcss(
            [cssdeclsort(
                {
                    order: 'concentric-css'
                }
            )]
        ))
        .pipe(concat('style.css'))
        .pipe(gulp.dest(config.themeDir));
});

gulp.task('php', () => {
    return gulp.src('assets/php/**/*.php')
        .pipe(gulp.dest(config.themeDir));
});

/*
gulp.task('browserify', () => {
    var bower = [
        'bower_components/waypoints/lib/noframework.waypoints.min.js',
        'bower_components/skrollr/dist/skrollr.min.js',
    ];

    return browserify(bower)
        .bundle()
        .pipe(source('vendor.js'))
        .pipe(gulp.dest('dist/js'));
});
*/

/*
gulp.task('vendorjs', () => {
    var bower = [
        'bower_components/parallax/deploy/parallax.min.js',
        'bower_components/waypoints/lib/noframework.waypoints.min.js',
        'bower_components/skrollr/dist/skrollr.min.js',
    ];

    return gulp.src(bower)
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest('dist/js'));
});
*/

gulp.task('js', () => {
    return gulp.src('./assets/js/*.js')
        .pipe(babel({
            presets: ['es2015']
        }))
        .pipe(concat('script.js'))
        .pipe(gulp.dest(config.themeDir + '/js'));
});

gulp.task('images', () => {
    return gulp.src('./assets/images/*')
        .pipe(imagemin())
        .pipe(gulp.dest(config.themeDir + '/images'))
});

/*
gulp.task('browsersync', (cb) => {
    var files = [
        // http://stackoverflow.com/a/34739238/1088526
        './assets/sass/*.scss',
        './assets/js/*.js',
        './assets/php/*.php'
    ];

    browsersync.init(files, {
        proxy: 'localhost/wvfrm3/wordpress',
        reloadDelay: 2000, // https://github.com/BrowserSync/browser-sync/issues/392#issuecomment-138419441
        port: 3000,
        notify: false
    }, cb);
});
*/

gulp.task('watch', () => {
    gulp.watch('css/src/*.scss', gulp.series('compass'));
    //gulp.watch('bower_components/**/*.js', gulp.series('browserify'));
    gulp.watch('js/*.js', gulp.series('js'));
    gulp.watch('./images/*', gulp.series('images'));
    gulp.watch("./*.html").on('change', browsersync.reload);
});

gulp.task('default',
    gulp.series('compass', 'js', 'images', 'php')
);