var gulp = require('gulp');
var imagemin = require('gulp-imagemin');
var imageminMozjpeg = require('imagemin-mozjpeg');
var imageminWebp = require('imagemin-webp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
var browserSync = require('browser-sync');
var uglify = require('gulp-uglify');


gulp.task('images', function() {
    gulp.src(['./src/images/*.png','./src/images/*.jpg','./src/images/*.gif'])
    .pipe(imagemin([imageminMozjpeg({
        quality: 75,
    })]))
    .pipe(gulp.dest('./images'));
});

gulp.task('webp', function() {
    gulp.src(['./src/images/*.png','./src/images/*.jpg','./src/images/*.gif'])
   
    .pipe(imagemin([imageminWebp({
        method: 6,
    })]))
    .pipe(rename({ extname: '.webp' }))
    .pipe(gulp.dest('./images'));
});


gulp.task('sass', function () {
    //gulp.src('./src/scss/*.scss', './src/scss/*/*.scss')
    gulp.src([
        './src/scss/*.scss',
        './src/scss/*/*.scss'
    ])
        .pipe(sourcemaps.init())        
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['> 1%', 'last 2 versions', 'Firefox >= 20'],
            cascade: false
        }))        
        .pipe(gulp.dest('./'))
	    .pipe(minifyCss({
	      keepSpecialComments: 0
        }))
        .pipe(concat('eo.css'))
        .pipe(sourcemaps.write('.'))
	    //.pipe(rename({ extname: '.min.css' }))
        .pipe(gulp.dest('./'));
});

gulp.task('compress', function() {
    gulp.src('./src/js/*.js')
    .pipe(gulp.dest('./js'))
      .pipe(uglify())
      .pipe(rename({ extname: '.min.js' }))
      .pipe(gulp.dest('./js'));
  });

gulp.task('browser-sync', function() {
    browserSync.init(["./*.css", "js/*.js", "*.php"], {
        /*server: {
            baseDir: "./"
        }*/
proxy: "http://localhost/www726/ibaiscanbit/",
        notify: false
    });
});

gulp.task('default', ['images', 'webp', 'sass', 'browser-sync', 'compress'], function () {
    gulp.watch("src/images/*.png','src/images/*.jpg','src/images/*.gif','src/images/*.jpeg", ['images']);
    gulp.watch("src/scss/*.scss", ['sass']);
    gulp.watch("src/scss/*/*.scss", ['sass']);
    gulp.watch("src/js/*.js", ['compress']);
});
