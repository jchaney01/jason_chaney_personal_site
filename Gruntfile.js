module.exports = function (grunt) {
    grunt.initConfig({
        deployexclude:{
            production:[
               '.idea',
               '*.DS_Store',
               '.sass-cache',
               '/client',
               '/node_modules',
               '.bowerrc',
               '.gitignore',
               'artisan',
               'composer.json',
               'composer.lock',
               'config.rb',
               '*.iml',
               'Gruntfile.js',
               'package.json',
               'phpunit.xml',
               'readme.md',
               'component.json',
               '.git',
               '.gitattributes'
            ]},
        img: {

            task4: {
                src: 'public/img'
            }

        },
        concat:{
            options:{
                stripBanners:false
            },
            all:{
                src:[
                    'client/components/jquery/jquery.js',
                    'client/components/jquery.lazyload/jquery.lazyload.js',
                    'client/js/bootstrap.min.js',
                    'client/js/supersized.3.2.7.min.js',
                    'client/js/waypoints.js',
                    'client/js/waypoints-sticky.js',
                    'client/js/jquery.isotope.js',
                    //'client/js/jquery.fancybox.pack.js',
                    //'client/js/jquery.fancybox-media.js',
                    'client/components/magnific-popup/dist/jquery.magnific-popup.js',
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
                files: { 'public/js/app.js':  '<%= concat.all.src %>' }
            }
        },
        compass: {
            production: {
                options: {
                    config: 'config.rb',
                    force: true
                }
            },
            development: {
                options: {
                    config: 'config-dev.rb',
                    force: true
                }
            }
        },
        rsync: {
            "deploy-production": {
                src: "./",
                dest: "/var/www/jasonchaney.com",
                host:  'jchaney@gemini.creativeacceleration.com',
                recursive: true,
                syncDest: true,
                syncDestIgnoreExcl: false, //Will delete files on server if not present locally if set to false
                exclude: '<%= deployexclude.production %>',
                args: ["-h","--stats"]
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

    // production is on CA MT VE
    grunt.registerTask('deploy', [
        'compass:production',
        'uglify',
        'rsync:deploy-production'
    ]);
    grunt.registerTask('deploy-direct', [
        'rsync:deploy-production'
    ]);
};