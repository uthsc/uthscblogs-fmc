module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    compass: {
      dist: {
        options: {
          importPath: 'bower_components/foundation/scss',
          outputStyle: 'expanded',
          sassDir: 'scss',
          cssDir: 'css',
          sourcemap: true
        }
      }
    },

    concat: {
      dist: {
        src: ['js/scripts/modernizr.js', 'js/scripts/lodash.js', 'js/scripts/app.js'],
        dest: 'js/scripts/build.js'
      }
    },

    copy: {
      main: {
        files: [
          { //foundation
            nonull: true,
            src: 'bower_components/foundation/js/foundation.min.js',
            dest: 'js/foundation.min.js'
          },
          { //modernizr
            nonull: true,
            src: 'bower_components/modernizr/modernizr.js',
            dest: 'js/scripts/modernizr.js'
          },
          { //lodash
            nonull: true,
            src: 'bower_components/lodash/lodash.js',
            dest: 'js/scripts/lodash.js'
          },
          { //fontawesome css
            nonull: true,
            src: 'bower_components/fontawesome/css/font-awesome.min.css',
            dest: 'css/font-awesome.min.css'
          },
          { //fontawesome fonts
            flatten: true,
            expand: true,
            nonull: true,
            src: 'bower_components/fontawesome/fonts/*',
            dest: 'fonts/'
          }
        ]
      }
    },

    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dist: {
        options: {
          outputStyle: 'expanded',
          sourceMap: true
        },
        files: {
          'css/uthsc.css': 'scss/uthsc.scss'
        }
      }
    },

    uglify: {
      options: {
        mangle: false
      },
      my_target: {
        files: {
          'js/app.min.js' : ['js/scripts/build.js']
        }
      }
    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-concat')
  grunt.loadNpmTasks('grunt-contrib-compass')
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');

  grunt.registerTask('build', ['copy', 'concat', 'uglify']);
  grunt.registerTask('default', ['sass','watch']);
}