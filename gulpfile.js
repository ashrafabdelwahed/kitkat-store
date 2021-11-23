var gulp = require("gulp"),
  concat = require("gulp-concat"),
  sass = require("gulp-sass"),
  autoprefixer = require("gulp-autoprefixer"),
  livereload = require("gulp-livereload"),
  sourcemaps = require("gulp-sourcemaps"),
  minify = require("gulp-minify");



gulp.task("css", function() {
  return gulp
    .src(["scss/*.scss", "scss/**/*.scss"])
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(concat("style.css"))
    .pipe(gulp.dest("css"))
    .pipe(gulp.dest("customer/css/"))
    .pipe(livereload());
});

gulp.task("css_admin", function() {
  return gulp
    .src(["./admin_area/scss/*.scss", "./admin_area/scss/**/*.scss"])
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(concat("style.css"))
    .pipe(gulp.dest("./admin_area/css"))
    .pipe(livereload());
});

gulp.task("watch", function() {
  livereload.listen();
  gulp.watch(["scss/*.scss", "scss/*/*.scss"], ["css"]);
  gulp.watch(["./admin_area/scss/*.scss", "./admin_area/scss/**/*.scss"], ["css_admin"]);
});
