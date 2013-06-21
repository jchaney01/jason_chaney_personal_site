module.exports = function (grunt) {
    grunt.initConfig({
        concat:{
            options:{
                stripBanners:false
            },
            all:{
                src:[
                    'client/components/jquery/jquery.js',
                    'client/js/bootstrap.min.js',
                    'client/js/supersized.3.2.7.min.js',
                    'client/js/waypoints.js',
                    'client/js/waypoints-sticky.js',
                    'client/js/jquery.isotope.js',
                    'client/js/jquery.fancybox.pack.js',
                    'client/js/jquery.fancybox-media.js',
                    'client/js/jquery.tweet.js',
                    'client/js/plugins.js',
                    'client/js/main.js'
                ],
                dest:'public/js/app.js'
            }
        },
        watch: {
            compass: {
                files: 'client/scss/**/*',
                tasks: ['compass']
            },
            sourcejs: {
                files: '<%= concat.all.src %>',
                tasks: ['concat']
            },
            minjs: {
                files: 'public/js/app.js',
                options: {
                    livereload: true
                }
            },
            css: {
                files: 'public/css/screen.css',
                options: {
                    livereload: true
                }
            },
            html: {
                files: 'app/views/*.php',
                options: {
                    livereload: true
                }
            }
        },
        uglify: {
            dist: {
                options: {
                    sourceMap: 'public/js/source-map.js',
                    beautify: false,
                    mangle:true
                },
                files: { 'js/app.js':  '<%= concat.all.src %>' }
            }
        },
        compass: {
            dist: {
                options: {
                    config: 'config.rb',
                    force: true
                }
            }
        }

    });

    // load tasks
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-rsync');
    grunt.loadNpmTasks('grunt-exec');
    grunt.loadNpmTasks('grunt-ssh');
    grunt.loadNpmTasks('grunt-img');

    // Run for local development
    grunt.registerTask('default', [
        'compass',
        'concat',
        'watch'
    ]);
};