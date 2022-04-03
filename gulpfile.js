const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const bro = require('gulp-bro');
const babelify = require('babelify');
const autoprefixer = require('gulp-autoprefixer');
const sass = require('gulp-sass')(require('sass'));
const minify = require('gulp-minify-css');

function taskBrowserify() {
    return gulp.src('js/main.js')
        .pipe(sourcemaps.init())
        .pipe(bro({
            transform: [
                babelify.configure({
                    presets: ['@babel/preset-env']
                }),
                ['uglifyify', {global: true}]
            ]
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('dist'))
}

function taskSass(){

    const sassTask = sass();
    sassTask.on('error', e => {
        console.log(e);
    });
    
    return gulp.src('scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sassTask) // Converts Sass to CSS with gulp-sass
        .pipe(autoprefixer('last 2 versions'))
        .pipe(minify())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('dist'));
}

const taskWatch = gulp.series(gulp.parallel(taskSass, taskBrowserify), function() {
    gulp.watch('scss/**/*.scss', taskSass);
    gulp.watch('js/**/*.js', taskBrowserify);
});

exports.browserify = taskBrowserify;
exports.sass = taskSass;

exports.watch = taskWatch;
