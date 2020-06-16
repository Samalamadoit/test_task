const gulp = require("gulp"); //gulp
const concat = require("gulp-concat"); //обьединение проектов
const autoprefixer = require("gulp-autoprefixer"); //добавляет префиксы
const jquery = require("jquery")
const cleanCSS = require('gulp-clean-css'); //минификация css
const uglify = require('gulp-uglify'); //минификация js
const del = require('del'); //обновление файлов
var browserSync = require('browser-sync').create(); // сервер
const sass = require('gulp-sass');
const rename = require('gulp-rename');
const notify = require('gulp-notify');

// порядок загрузки
const jsFiles = [ 
    './src/js/lib.js',
    './src/js/main.js'
]

function styles() {
	return gulp.src('./src/scss/**/*.scss')
		.pipe(sass({
			outputStyle: 'expanded'
		}).on("error", notify.onError()))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(autoprefixer({
			cascade: false,
		}))
		.pipe(cleanCSS({
			level: 2
		}))
		.pipe(gulp.dest('./build/css/'))
		.pipe(browserSync.stream());
}

function scripts() {
    return gulp.src('./src/js/**/*.js')
        .pipe(concat('all.js'))
        .pipe(uglify({
            toplevel: true,
        }))
        .pipe(gulp.dest('./build/js'))
        .pipe(browserSync.stream());
}


// автообновление
function watch() {

    browserSync.init({ //запуск сервака
        server: {
            baseDir: "./"
        },
        tunnel: false, // создание доступного СЕРВЕРА на своем компе. см КМ tunnel
    });

    gulp.watch('./src/scss/**/*.scss', styles); // следим за css
    gulp.watch('./src/js/**/*.js', scripts); // следим за js
    gulp.watch('./*.php', browserSync.reload); // следим за html
}

function clean() {
    return del(['build/*'])
}

gulp.task('styles', styles);
gulp.task('scripts', scripts);
gulp.task('watch', watch);

gulp.task('default', gulp.series(clean, gulp.parallel(styles, scripts), 'watch' ));