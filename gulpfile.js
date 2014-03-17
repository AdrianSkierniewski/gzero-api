var gulp = require('gulp'),
    path = require('path'),
    watch = require('gulp-watch'),
    apidoc = require('gulp-apidoc');

// default task generate api docs
gulp.task('default', function () {
    watch({glob: 'src/Gzero/Api/Controllers/*.php'}, function (files) {
        return apidoc.exec({
            src: "src/Gzero/Api",
            dest: "build/",
            debug: true,
            includeFilters: [".*\\.php"]
        });
    });
});
