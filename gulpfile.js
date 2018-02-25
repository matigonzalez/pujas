
var env, vendor = "node_modules/";
const
	gulp = require('gulp'),
	cleanCss = require('gulp-clean-css'),
	concat = require('gulp-concat'),
	uglify = require('gulp-js-minify'),
	htmlMinifier = require('gulp-html-minifier'),
	autoprefixer = require('gulp-autoprefixer'),
	browserSync = require('browser-sync'),
	sass = require('gulp-sass'),
	gulpif = require('gulp-if'),
	del = require('del'),
	stripComments = require('gulp-strip-comments')
;

gulp.task('watch-scripts', ()=> gulp.watch(['client/source/assets/js/*/*.js', 'client/source/assets/js/*.js'], ['scripts']));
gulp.task('watch-styles', ()=> gulp.watch(['client/source/assets/sass/*','client/source/assets/sass/*/*'], ['styles']));
gulp.task('watch-html', ()=> gulp.watch(['client/source/index.html','client/source/html/*/*'], ['html']));
gulp.task('watch-htaccess', ()=> gulp.watch(['client/source/.htaccess'], ['htaccess']));
gulp.task('watch', ['watch-scripts', 'watch-styles', 'watch-html', 'watch-htaccess']);
gulp.task('sync', ()=> browserSync({ server: {baseDir: 'client/public/'}, notify: false }));
gulp.task('serve', ['default', 'sync']);
gulp.task('setDebug', ()=> env = "debug");
gulp.task('debug', ['setDebug', 'default']);
gulp.task('clean', ()=> del('client/public/**', {force:true}));
gulp.task('build', ['scripts','vendors','styles','html','htaccess']);
gulp.task('prod', ['clean'], ()=> gulp.start('build'));


gulp.task('default', ['build', 'watch'], ()=> {
	process.stdout.write("\n\tComplete!!\n");
	process.stdout.write("\n\tMore commands:");
	process.stdout.write("\n\tgulp clean 	- [remove client/public directory]");
	process.stdout.write("\n\tgulp debug 	- [no minify]");
	process.stdout.write("\n\tgulp build 	- [create all client/public files]");
	process.stdout.write("\n\tgulp prod 	- [run before deploy]");
	process.stdout.write("\n\tgulp serve 	- [listen & watch on localhost:3000]");
	process.stdout.write("\n\tgulp 		- [for develop, w/ watch on client/public]\n\n");
});



/*FILES*/

gulp.task('vendors', ()=>
	gulp.src([
		vendor + 'jquery/dist/jquery.min.js',
		vendor + 'angular/angular.min.js',
		vendor + 'angular-animate/angular-animate.min.js',
		vendor + 'angular-route/angular-route.min.js',
		vendor + 'bootstrap/dist/js/bootstrap.min.js'
		])
		.pipe(concat("vendors.js"))
		.pipe(gulp.dest('client/public/static/js/'))
);

gulp.task('scripts', ()=>
	gulp.src([
        'client/source/assets/js/module.js',
        'client/source/assets/js/*/*.js',
        'client/source/assets/js/*.js'
		])
		.pipe(concat("app.js"))
		.pipe(gulpif((env !== "debug"), uglify()))
		.pipe(gulp.dest('client/public/static/js/'))
);



gulp.task('styles', ()=>
	gulp.src([
		vendor + 'bootstrap/dist/css/bootstrap.min.css',
		'client/source/assets/sass/main.sass'
		])
        .pipe(sass().on('error', sass.logError))
		.pipe(gulpif((env !== "debug"), cleanCss()))
		.pipe(autoprefixer())
		.pipe(concat("main.css"))
		.pipe(gulp.dest('client/public/static/css'))
);

gulp.task('html', ()=> 
	gulp.src([
		'client/source/index.html',
		'client/source/html/*/*',
		])
	.pipe(gulpif((env !== "debug"), htmlMinifier({collapseWhitespace: true, removeComments: true})))
	.pipe(gulp.dest('client/public'))
);

gulp.task('htaccess', ()=> gulp.src('client/source/.htaccess').pipe(gulp.dest('client/public')));

/*FILES*/





