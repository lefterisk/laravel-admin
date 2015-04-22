//GUlp components
var gulp        = require('gulp'),
    concat      = require('gulp-concat'),      //concats files
    uglify      = require('gulp-uglify'),      //minifies files
    ngAnnotate  = require('gulp-ng-annotate'), //annotates (angular brakes without this)
    minifyCSS   = require('gulp-minify-css'),  //minifies css files
    runSequence = require('run-sequence'),     //runs gulp tasks in sequence (tasks as array)
    sass        = require('gulp-sass'),        //sass compiler
    sourcemaps  = require('gulp-sourcemaps');  //creates sourcemaps for debugging


/**
 * IF GULP IS TYPED WITH NO OTHER ARGUMENTS THIS WILL BE EXECUTED
 */
gulp.task('default', function() {
    runSequence(
        //everything in square brackets executes in parallel
        //to force sequential execution put your task outside brackets
        [
            'vendor-js',
            'vendor-css',
            'app-js',
            'app-scss',
            'separate-js',
            'fonts',
            'images'
        ]
    );
});

/**
 * START ALL THE WATCHERS
 */
gulp.task('watch-init', function() {
    runSequence(
        //everything in square brackets executes in parallel
        //to force sequential execution put your task outside brackets
        [
            'watch-app-js',
            'watch-app-css'
        ]
    );
});

/**
 * JAVASCRIPT RELATED TASKS
 */
//Concat & compress vendor files
gulp.task('vendor-js', function () {
    gulp.src(
        [
            'bower_components/jquery-1.11.1.min/index.js',
            'bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        ]
    )
        .pipe(concat('cms-vendor.min.js'))
        .pipe(ngAnnotate())
        .pipe(uglify())
        .pipe(gulp.dest('../public/js'));
});

//Concat & compress application specific files
gulp.task('app-js', function () {
    gulp.src(['js/*.js'])
        .pipe(concat('cms-app.min.js'))
        .pipe(ngAnnotate())
        .pipe(uglify())
        .pipe(gulp.dest('../public/js'));
});

//File watcher: if an app specific js is edited run concat compressor again
gulp.task('watch-app-js', ['app-js'], function () {
    gulp.watch('js/*.js', ['app-js']);
});

//Copy over scripts that for some reason need to be alone (not concatenated with the rest)
gulp.task('separate-js', function() {
    gulp.src(
        [
            //list of scripts that need to exist as separate files
            'bower_components/lt-ie-9/lt-ie-9.min.js'
        ]
    )
        .pipe(gulp.dest('../public/js'));
});

/**
 * END OF JAVASCRIPT RELATED TASKS
 */

/**
 * CSS RELATED TASKS
 */
//compile app specific scss to css
gulp.task('app-scss', function() {
    gulp.src('css/scss/*.scss')
        .pipe(sourcemaps.init())
        //The onError handler prevents Gulp from crashing when you make a mistake in your SASS
        //compile & compress
        .pipe(sass({onError: function(e) { console.log(e); }, outputStyle: 'compressed'}))
        //make source-maps but put them in a different folder & not include content
        .pipe(sourcemaps.write('maps', {includeContent: false}))
        .pipe(gulp.dest('../public/css'));
});

//watch app specific scss
gulp.task('watch-app-css', ['app-scss'], function () {
    gulp.watch('css/scss/*.scss', ['app-scss']);
});

//concat vendor css files MUST BE MINIFIED AT THIS STAGE
gulp.task('vendor-css', function() {

    gulp.src(
        [
            'bower_components/animate.css/animate.min.css',
            'css/vendor/*.css'
        ]
    )
        .pipe(concat('cms-vendor.min.css'))
        .pipe(minifyCSS({keepSpecialComments:'*'}))
        .pipe(gulp.dest('../public/css/'));
});
/**
 * END OF CSS RELATED TASKS
 */

/**
 * FONTS RELATED TASKS
 */
gulp.task('fonts', function() {
    //for now copy over the bootstrap fonts
    gulp.src('bower_components/bootstrap-sass/assets/fonts/**/*.{ttf,woff,woff2,eof,svg}')
        .pipe(gulp.dest('../public/fonts'));
});
/**
 * END OF FONTS RELATED TASKS
 */

/**
 * IMG RELATED TASKS
 */
gulp.task('images', function() {
    //for now copy over the bootstrap fonts
    gulp.src('img/**/*')
        .pipe(gulp.dest('../public/img'));
});
