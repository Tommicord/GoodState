import gulp from 'gulp';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename';
import sourcemaps from 'gulp-sourcemaps';

export function javascript() {
    return gulp.src('src/js/*.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('build/js'));
}

export function watch() {
    gulp.watch('src/js/*.js', javascript);
}

export default gulp.series(javascript, watch);