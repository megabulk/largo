# Largo Docs

Documentation in this directory is written in [reStructuredText](http://docutils.sourceforge.net/rst.html), compiled to html by [Sphinx](http://sphinx-doc.org/) and hosted in its final form at [largo.readthedocs.io](http://largo.readthedocs.io/).

[![Documentation Status](https://readthedocs.org/projects/largo/badge/?version=develop)](https://readthedocs.org/projects/largo/?badge=develop)

### Contributing

We'd love your help! We host the documentation with the code so it's as simple as possible to get started. Editing the docs is a three step process:

1. Edit the .rst files in the `docs/` folder.
2. Compile these changes locally to check the work.
3. Issue a pull request for us to merge in.

##### Compiling.

We've built wrappers around the sphinx compilation process to make it easy to use.

###### 1. Use our development tools:

If you're already using our development tools ([INN/deploy-tools](https://github.com/INN/deploy-tools/)), running:

	$ fab dev assets.watch

will compile .html documentation when *.rst files are saved.

The HTML files will be saved in `docs/_build/html`.

###### 2. Using grunt directly:

In a new terminal window install the python dependencies in `docs/`

    $ pip install -r requirements.txt

_(If you do not have pip installed, you can install it with _`sudo easy_install pip`_. Requirements may be installed in a python [virtualenv](http://docs.python-guide.org/en/latest/dev/virtualenvs/).)_

Now to compile docs run:

	$ grunt docs

To have grunt watch for changes and compile automatically, you can run:

	$ grunt watch

The HTML files will be saved in `docs/_build/html`.

### Autogenerated PHP Docblocks

You can use [PEAR](https://pear.php.net/), the PHP Extension and Application Repository application, to install [doxphp](https://github.com/avalanche123/doxphp) which is used in this project to extract Docblocks from the PHP files and generate Sphinx-compatible ReStructuredText files. These RST files are ultimately converted to HTML by the version of Sphinx that is built in to ReadTheDocs.

###### 1. Install [PEAR](https://pear.php.net/manual/en/installation.getting.php):

    $ wget http://pear.php.net/go-pear.phar
    $ php -d detect_unicode=0 go-pear.phar

If you accept all defaults in the installation, this will install PEAR to your home directory under the `pear` subdirectory. The `pear` executable can be found in the `bin` subdirectory; for example, for a user "nick" the path would be `/Users/nick/pear/bin`. Add this to your `PATH` variable by editing your `~/.zshrc` or `~/.bashrc` file and adding the following line (substitute in your username):

    export PATH=$PATH:/Users/nick/pear/bin

After doing this, either copy and paste the above to adjust your `PATH` setting directly, or apply changes from your shell initialization script with `source ~/.zshrc`/`source ~/.bashrc`.

###### 2. Install [doxphp](https://github.com/avalanche123/doxphp):

    $ pear channel-discover pear.avalanche123.com
    $ pear install avalanche123/doxphp-beta

This will install the commands `doxphp` and `doxphp2sphinx` to the same location as the `pear` executable.

###### 3. Extract the documentation:

    $ grunt apidocs

This will create RST files in `docs/api` with the same relative path as the original file. For instance, the file `inc/helpers.php` will have a corresponding output of `docs/api/inc/helpers.rst`.
