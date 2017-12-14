/* === COMMANDS === */

// SERVIDOR                   - gulp server
// SPRITE                     - gulp sprite 
// IMAGEM COMPRESS LOSSESS    - gulp build-img
// FINALIZAÃ‡ÃƒO                - gulp build-finish

/* === INIT === */

var gulp = require('gulp'),
    imagemin = require('gulp-imagemin'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    htmlReplace = require('gulp-html-replace'),
    uglify = require('gulp-uglify'),
    usemin = require('gulp-usemin'),
    cssmin = require('gulp-cssmin'),
    htmlmin = require('gulp-htmlmin'),
    sass = require('gulp-sass');
    autoprefixer = require('gulp-autoprefixer'),
    merge = require('merge-stream'),
    spritesmith = require('gulp.spritesmith'),
    tinypng = require('gulp-tinypng'),
    revReplace = require('gulp-rev-replace'),
    rev = require('gulp-rev'),
    revdel = require('gulp-rev-delete-original'),
    sequence = require('gulp-sequence'),
    ttf2eot = require('gulp-ttf2eot'),
    ttf2woff = require('gulp-ttf2woff'),
    font2css = require('gulp-font2css').default,
    concat = require('gulp-concat'),
    browserSync = require('browser-sync');

/* === SCRIPTS === */

gulp.task('copy', ['clean'], function() {

  return gulp.src('public/**/*')
    .pipe(gulp.dest('dist'));
});

gulp.task('clean', function() {

  return gulp.src('dist')
    .pipe(clean());
});

gulp.task('server', ['build-sass', 'browserSync'], function() {
  // gulp.watch('resources/views/**/*.blade.php', browserSync.reload);
  gulp.watch('resources/views/**/**/*.blade.php', browserSync.reload);
  gulp.watch('resources/assets/js/**/*.js', ['js']);
  gulp.watch('resources/**/*.scss').on('change', function (){
    gulp.start('build-sass');
  });
  gulp.watch('public/**/*').on('change', browserSync.reload);
});



gulp.task('browserSync', function() {

  browserSync.init({
    // server: { baseDir: 'app' }
//    proxy:'localhost:8000'
   // proxy:'designio.dev/jouglard/site/jouglard/public'

    proxy: {
        target: 'localhost:8000',
        reqHeaders: function() {
            return {
                host: 'localhost:3000'
            };
        }
    }
  })
});


gulp.task('js', function(){
  return gulp.src('resources/assets/js/*.js')
    
    .pipe(gulp.dest('public/assets/js'))
    .pipe(browserSync.stream());
});



gulp.task('sprite', ['build-sprite'], function (){

  gulp.start('build-tinypng');
});

gulp.task('rev', function(){
  return gulp.src(['dist/**/*.{css,js,jpg,jpeg,png,svg}'])
    .pipe(rev())
    .pipe(revdel())
    .pipe(gulp.dest('dist/'))
    .pipe(rev.manifest())
    .pipe(gulp.dest('dist/'))
})

gulp.task('revreplace', ['rev'], function(){
  return gulp.src(['dist/index.html', 'dist/**/*.css', 'dist/**/*.js'])
    .pipe(revReplace({
        manifest: gulp.src('dist/rev-manifest.json'),
        replaceInExtensions: ['.html', '.js', '.css']
    }))
    .pipe(gulp.dest('dist/'));
});

gulp.task('ttf2eot', function(){
  return gulp.src(['public/assets/fonts/*.ttf'])
    .pipe(ttf2eot())
    .pipe(gulp.dest('dist/assets/fonts/'));
});

gulp.task('ttf2woff', function(){
  return gulp.src(['public/assets/fonts/*.ttf'])
    .pipe(ttf2woff())
    .pipe(gulp.dest('dist/assets/fonts/'));
});

/* === BUILDS === */

gulp.task('build-img', function() {

  return gulp.src('public/assets/img/**/.{png,svg,jpg,gif}')
    .pipe(imagemin())
    .pipe(gulp.dest('dist/assets/img/'));
});

gulp.task('build-sprite', function () {
  var spriteData = gulp.src('public/assets/img/icon-*.png').pipe(spritesmith({
    imgName: 'sprite.png',
    cssName: 'sprite.css'
  }));

  var imgStream = spriteData.img
    .pipe(gulp.dest('public/assets/img/'));

  var cssStream = spriteData.css
    .pipe(gulp.dest('public/assets/css/'));

  return merge(imgStream, cssStream);
});

gulp.task('build-fonts', ['ttf2eot', 'ttf2woff'], function() {
  return gulp.src('public/assets/fonts/*.{otf,ttf,woff,woff2}')
    .pipe(font2css())
    .pipe(concat('fonts.css'))
    .pipe(gulp.dest('dist/assets/fonts/'))
});

gulp.task('build-tinypng', function () {
    return gulp.src('public/assets/img/sprite.png')
        .pipe(tinypng(tinyKey))
        .pipe(gulp.dest('public/assets/img'));
});


gulp.task('build-sass', function(){

  return gulp.src('resources/assets/sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
        browsers: ['last 10 versions'],
        cascade: false
    }))
    .pipe(gulp.dest('public/assets/css/'));
});


gulp.task('plugins:js', function() {
    gulp.src('resources/assets/js/plugins.js')
    .pipe(include())
        .on('error', console.log)
    .pipe(uglify())
    .pipe(gulp.dest('public/assets/js'));
});

gulp.task('minify-html', function() {
  return gulp.src('dist/**/*.html')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('dist/'))
});

gulp.task('build-compress', ['build-sass'], function() {

  return gulp.src('public**/build.{html,php}')
    .pipe(usemin({
      js: [uglify({preserveComments : false})],
      css: [cssmin({keepSpecialComments : 0})]
    }))
    .pipe(gulp.dest('dist'));
});

gulp.task('finish', sequence('copy', 'build-img', 'build-compress', 'minify-html', 'build-fonts', 'revreplace'))