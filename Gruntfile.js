// npm install grunt-postcss pixrem autoprefixer cssnano

module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        options:{
          style:'compressed'
        },
        files: {
          'style.css' : 'sass/style.scss'
        }
      }
    },
    postcss: {
      options: {
      map: true, // inline sourcemaps      

      processors: [
        require('pixrem')(), // add fallbacks for rem units
        require('autoprefixer')({browsers: 'last 5 versions'}), // add vendor prefixes
        require('cssnano')() // minify the result
        ]
      },
      files: {
        'style.css' : 'style.css'
      }
    },
    notify: {
      postcss: {
        options: {
          title: 'Task Complete',  // optional
          message: 'Sass and PostCSS finished running', //required
        }
      }
    },
    watch: {
      set1: {
        files: 'sass/**/*.scss',
        tasks: ['sass', 'postcss', 'notify']
      }
    }
  });
grunt.loadNpmTasks('grunt-contrib-sass');
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-postcss');
grunt.loadNpmTasks('grunt-notify');
grunt.registerTask('default',['watch']);
}