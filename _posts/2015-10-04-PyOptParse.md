---
layout: post
title: Python分析命令行输入:OptParse模块
date: 2015-10-04 07:42:22
categories: Coding
tags: Python
---

要自己定制程序的参数选项控制, 以前我们自己也有optparser, 但python就自带了! 真好!! 之前一直很暴力直接使用sys.argv,直接调用, 因为bash也用习惯了..不过要做些大点的, 还是要借用optparse的. 这里只介绍optparse. 

optparse现在不再更新了,更新版本叫argparse..和其余的都不介绍了..可以参考ref1.

## optparse module

### 类级别

~~~python
exceptions.Exception(exceptions.BaseException)
    OptParseError
        BadOptionError
        OptionError
            OptionConflictError
        OptionValueError
HelpFormatter
    IndentedHelpFormatter
    TitledHelpFormatter
Option
OptionContainer
    OptionGroup
    OptionParser
Values
~~~

### OptionParser类
我们一般只使用其 OptionParser 这个类:

~~~python
class OptionParser(OptionContainer):
	'''
	  Class attributes:
	    standard_option_list : [Option]
	      list of standard options that will be accepted by all instances
	      of this parser class (intended to be overridden by subclasses).

	  Instance attributes:
	    usage : string
	      a usage string for your program.  Before it is displayed
	      to the user, "%prog" will be expanded to the name of
	      your program (self.prog or os.path.basename(sys.argv[0])).
	    prog : string
	      the name of the current program (to override
	      os.path.basename(sys.argv[0])).
	    description : string
	      A paragraph of text giving a brief overview of your program.
	      optparse reformats this paragraph to fit the current terminal
	      width and prints it when the user requests help (after usage,
	      but before the list of options).
	    epilog : string
	      paragraph of help text to print after option help

	    option_groups : [OptionGroup]
	      list of option groups in this parser (option groups are
	      irrelevant for parsing the command-line, but very useful
	      for generating help)

	    allow_interspersed_args : bool = true
	      if true, positional arguments may be interspersed with options.
	      Assuming -a and -b each take a single argument, the command-line
	        -ablah foo bar -bboo baz
	      will be interpreted the same as
	        -ablah -bboo -- foo bar baz
	      If this flag were false, that command line would be interpreted as
	        -ablah -- foo bar -bboo baz
	      -- ie. we stop processing options as soon as we see the first
	      non-option argument.  (This is the tradition followed by
	      Python's getopt module, Perl's Getopt::Std, and other argument-
	      parsing libraries, but it is generally annoying to users.)

	    process_default_values : bool = true
	      if true, option default values are processed similarly to option
	      values from the command line: that is, they are passed to the
	      type-checking function for the option's type (as long as the
	      default value is a string).  (This really only matters if you
	      have defined custom types; see SF bug #955889.)  Set it to false
	      to restore the behaviour of Optik 1.4.1 and earlier.

	    rargs : [string]
	      the argument list currently being parsed.  Only set when
	      parse_args() is active, and continually trimmed down as
	      we consume arguments.  Mainly there for the benefit of
	      callback options.
	    largs : [string]
	      the list of leftover arguments that we have skipped while
	      parsing options.  If allow_interspersed_args is false, this
	      list is always empty.
	    values : Values
	      the set of option values currently being accumulated.  Only
	      set when parse_args() is active.  Also mainly for callbacks.

	  Because of the 'rargs', 'largs', and 'values' attributes,
	  OptionParser is not thread-safe.  If, for some perverse reason, you
	  need to parse command-line arguments simultaneously in different
	  threads, use different OptionParser instances.

	  Methods defined here:

	  __init__(self, usage=None, option_list=None, option_class=<class optparse.Option>, version=None, conflict_handler='error', description=None, formatter=None, add_help_option=True, prog=None, epilog=None)

	  add_option_group(self, *args, **kwargs)

	  check_values(self, values, args)
	      check_values(values : Values, args : [string])
	      -> (values : Values, args : [string])

	      Check that the supplied option values and leftover arguments are
	      valid.  Returns the option values and leftover arguments
	      (possibly adjusted, possibly completely new -- whatever you
	      like).  Default implementation just returns the passed-in
	      values; subclasses may override as desired.

	  destroy(self)
	      Declare that you are done with this OptionParser.  This cleans up
	      reference cycles so the OptionParser (and all objects referenced by
	      it) can be garbage-collected promptly.  After calling destroy(), the
	      OptionParser is unusable.

	  disable_interspersed_args(self)
	      Set parsing to stop on the first non-option. Use this if
	      you have a command processor which runs another command that
	      has options of its own and you want to make sure these options
	      don't get confused.

	  enable_interspersed_args(self)
	      Set parsing to not stop on the first non-option, allowing
	      interspersing switches with command arguments. This is the
	      default behavior. See also disable_interspersed_args() and the
	      class documentation description of the attribute
	      allow_interspersed_args.

	  error(self, msg)
	      error(msg : string)

	      Print a usage message incorporating 'msg' to stderr and exit.
	      If you override this in a subclass, it should not return -- it
	      should either exit or raise an exception.

	  exit(self, status=0, msg=None)

	  expand_prog_name(self, s)

	  format_epilog(self, formatter)

	  format_help(self, formatter=None)

	  format_option_help(self, formatter=None)

	  get_default_values(self)

	  get_description(self)

	  get_option_group(self, opt_str)

	  get_prog_name(self)

	  get_usage(self)

	  get_version(self)

	  parse_args(self, args=None, values=None)
	      parse_args(args : [string] = sys.argv[1:],
	                 values : Values = None)
	      -> (values : Values, args : [string])

	      Parse the command-line options found in 'args' (default:
	      sys.argv[1:]).  Any errors result in a call to 'error()', which
	      by default prints the usage message to stderr and calls
	      sys.exit() with an error message.  On success returns a pair
	      (values, args) where 'values' is an Values instance (with all
	      your option values) and 'args' is the list of arguments left
	      over after parsing options.

	  print_help(self, file=None)
	      print_help(file : file = stdout)

	      Print an extended help message, listing all options and any
	      help text provided with them, to 'file' (default stdout).

	  print_usage(self, file=None)
	      print_usage(file : file = stdout)

	      Print the usage message for the current program (self.usage) to
	      'file' (default stdout).  Any occurrence of the string "%prog" in
	      self.usage is replaced with the name of the current program
	      (basename of sys.argv[0]).  Does nothing if self.usage is empty
	      or not defined.

	  print_version(self, file=None)
	      print_version(file : file = stdout)

	      Print the version message for this program (self.version) to
	      'file' (default stdout).  As with print_usage(), any occurrence
	      of "%prog" in self.version is replaced by the current program's
	      name.  Does nothing if self.version is empty or undefined.

	  set_default(self, dest, value)

	  set_defaults(self, **kwargs)

	  set_process_default_values(self, process)

	  set_usage(self, usage)

	  ----------------------------------------------------------------------
	  Data and other attributes defined here:

	  standard_option_list = []

	  ----------------------------------------------------------------------
	  Methods inherited from OptionContainer:

	  add_option(self, *args, **kwargs)
	      add_option(Option)
	      add_option(opt_str, ..., kwarg=val, ...)

	  add_options(self, option_list)

	  format_description(self, formatter)

	  get_option(self, opt_str)

	  has_option(self, opt_str)

	  remove_option(self, opt_str)

	  set_conflict_handler(self, handler)

	  set_description(self, description)
	'''
~~~

## 基本用法:

1. 载入OptionParser类,新建对象: OptionParser()
2. 添加选项: add_option(...)
3. 参数解析: parse_args()

~~~python
from optparse import OptionParser 
parser = OptionParser() 
parser.add_option("-i", "--input", action="store_true", 
                  dest="input", 
                  default=False, 
                  help="read input data from input file") 
parser.add_option("-o", "--output", action="store_true", 
                  dest="output", 
                  default=False, 
                  help="write data to output file") 

(options, args) = parser.parse_args() 

if options.input==True: 
    print 'input is true' 
if options.ouput==True: 
    print 'ouput is true'
~~~




## Reference
1. [Python中的命令行解析工具介绍](http://lingxiankong.github.io/blog/2014/01/14/command-line-parser/)

------
