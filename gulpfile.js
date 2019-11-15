let gulp = require('gulp'),
    sass = require('gulp-sass'),
    del = require('del'),
    minify = require('gulp-minify'),
    cleanCSS = require('gulp-clean-css'),
    sourcemaps = require('gulp-sourcemaps');

gulp.task('minify', () => {
    return gulp.src('resources/js/*.js', { allowEmpty: true })
        // .pipe(sourcemaps.init())
        .pipe(minify({noSource: true,ext:'.js',suffix: ''}))
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/js/'))
});

gulp.task('build', () => {
    return gulp.src('resources/sass/**/*.scss')
        // .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/css/'));
});

gulp.task('clean', () => {
    return del([
        'public/css/theme.css'
    ]);
});

gulp.task('cache-clean', () => {
    return del([
        'public/css/.sass-cache/',
    ]);
});


gulp.task('default', gulp.series(['build','minify','cache-clean']));
gulp.task('watch', () => {
    gulp.watch('resources/sass/**/*.scss', (done) => {
        gulp.series(['build','cache-clean'])(done);
    });
    gulp.watch(['resources/js/*.js', 'lib/*.mjs'], (done) => {
        gulp.series(['minify'])(done);
    });
});
