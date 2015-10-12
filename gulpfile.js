var gulp = require('gulp'),
    //browserSync = require('browser-sync'),
    //reload = browserSync.reload,
    //cache = require('gulp-cached'),
    //concat = require('gulp-concat'),
    cssmin = require('gulp-minify-css'),
    //imagemin = require('gulp-imagemin'),
    //pngquant = require('imagemin-pngquant'),
    prefix = require('gulp-autoprefixer'),
    //jshint = require('gulp-jshint'),
    //merge = require('merge-stream'),
    //minifyHTML = require('gulp-minify-html'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    scsslint = require('gulp-scss-lint'),
    size = require('gulp-size');
    //uglify = require('gulp-uglify');

    var themeDir = '/';

    gulp.task('scss', function() {
        var onError = function(err) {
            notify.onError({
                title:    "Gulp SCSS",
                subtitle: "Uh oh! Something's not right",
                message:  "Error: <%= error.message %>",
                sound:    "Beep"
            })(err);
            this.emit('end');
        };

        return gulp.src('css/style.scss')
        .pipe(plumber({errorHandler: onError}))
        .pipe(sass())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(prefix())
        .pipe(rename('style-skin.css'))
        .pipe(gulp.dest('css/'))
        .pipe(cssmin())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('./'))
    });

    gulp.task('scss-lint', function() {
        gulp.src('css/**/*.scss')
        .pipe(cache('scsslint'))
        .pipe(scsslint());
    });

    gulp.task('watch', function() {
        gulp.watch('css/**/*.scss', ['scss']);
    });


    gulp.task('default', ['scss', 'watch']);
