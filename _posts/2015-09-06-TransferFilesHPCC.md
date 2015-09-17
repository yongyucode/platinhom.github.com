---
layout: post
title: 传输文件到集群
date: 2015-09-05 20:50:39
categories: IT
tags: Cluster
---

This document highlights several simple methods to transfer files to the HPCC.
Using a GUI (Windows/OS X/Linux)
Mapping Your Home or Research Space to your local computer
Using Dropbox (Windows/OS X/Linux)
Using Unix commands
Basic file copy (scp)
Synchronize directories (rsync)
Interactive file copy (sftp)
Copy file from Internet (Wget)
Using a GUI (Windows/OS X/Linux)
Download and install the appropriate (free) Filezilla client from http://filezillaproject.org/download.php.
To use, launch the program. You should see a screen similar to this:

![](https://wiki.hpcc.msu.edu/download/attachments/13864442/filezilla_screen1.png?version=1&modificationDate=1314306681000&api=v2)

In the top dialog boxes, enter:
(Host) hpcc.msu.edu
(Username) <your username>
(Password) <your password>
(Port) 22
Then click connect or quickconnect. The first time you use this, you will have to accept the host certificate.
![](https://wiki.hpcc.msu.edu/download/attachments/13864442/filezilla_screen2.png?version=1&modificationDate=1314307954000&api=v2)

Once connected, the left column displays files on your local computer, the right column displays files on hpcc.
You can select the appropriate directories by double clicking through each tree. Files can be dragged and dropped from one column to the next. (By dragging files from the left column to the right, you are uploading files to HPCC from your local computer. By dragging files from the right column to the left, you can download files from HPCC to your local computer.
Mapping Your Home or Research Space to your local computer
You can copy files using Windows Explorer or OSX Finder if you are on campus by using the following instructions. Mapping HPC drives to a campus computer
Using Dropbox (Windows/OS X/Linux)
If you are a Dropbox user, you can setup HPCC to sync automatically with your Dropbox account.
Download the following file to your home directory on HPCC, http://www.dropbox.com/download/?plat=lnx.x86_64
Log into one of the development nodes
`ssh dev-intel10`
untar the downloaded file using the following command
`tar -zxvf dropbox-lnx.x86_64-x.x.xx.tar.gz`
start screen
`screen`
run dropboxd in a screen session and You should see output like this:

~~~bash
~/.dropbox-dist/dropboxd
This client is not linked to any account... Please visit https://www.dropbox.com/cli_link?host_id=7d44a557aa58f285f2da0x67334d02c1 to link this machine.
~~~

Copy the link to a web browser to activate your installation.
After the client is registered, detach the screen session by pressing ctrl-a, and then d.
Using Unix commands
A number of different command-line utilities are available to OS X and Linux users. Each of them has its own advantages.
Basic file copy (scp)
A simple command for transferring files between the cluster and another host is scp. To copy a file from a local directory to file space on the cluster, use a line like
scp example.txt username@hpcc.msu.edu:example_copy.txt
This will copy the file named example.txt in the local host's home directory to the user's home directory on the cluster, with the copy having the name example_copy.txt. Leaving the space after the colon blank gives the new file the same name as the original.  Note: To transfer a file name with spaces you must put a backslash before each space in your file name, i.e.
`scp "My File Name" username@hpcc.msu.edu:"My\ File\ Name"`
To copy a file from the cluster to your local directory,
`scp username@hpcc.msu.edu:example.txt ./example_copy.txt`
will copy the file named example.txt from the user's home directory on the cluster to the home directory of the local host, naming the new file example_copy.txt. Leaving the space after the slash blank gives the new file the same name as the original. The -r option can be used to copy entire directories recursively. 
Synchronize directories (rsync)
If you are an advanced LINUX/Mac user, there is a wonderful little utility that makes mirroring directories simple. The syntax looks very similar to scp.
To mirror <local_dir> on my local computer to <hpcc_dir> on hpcc, the following command can be issued.
`rsync -ave ssh <local_dir> username@hpcc.msu.edu:<hpcc_dir>`
In the above command, rsync will scan through both directories. If any files in the <local_dir> are newer, they will be uploaded to <hpcc_dir>. (It is also possible to get rsync to upload ALL different files, regardless of which is newer).
To mirror the HPCC directory to your local system, call
`rsync -ave ssh username@hpcc.msu.edu:<hpcc_dir> <local_dir>`
Icon
the first time you use rsync, you might want to add the -n flag to do a dry run before any files are copied.
Interactive file copy (sftp)
When preforming several data transfers between hosts, the sftp command may be preferable, as it allows the user to work interactively. Running
`sftp username@hpcc.msu.edu`
from a local host establishes a connection between that host and the cluster. Both hosts can be navigated. For the local file system, lcd changes to the specified directory, lpwd prints the working directory, and lls prints a list of files in the current directory. For the remote file system, the same three commands are available, minus the leading "l." Also available are commands to change permissions, rename files, and manipulate directories on the remote host. The two key commands are get example.txt, which copies the file in the remote working directory to the local working directory, and put example.txt, which copies the file in the local working directory to the remote working directory. The quit command closes the connection between hosts.
Copy file from Internet (Wget)
Wget is a simple command useful for copying files from the Internet to a user's file space on the cluster. Submitting the line
`wget http://www.examplesite.com/examplefile.txt`
downloads examplefile.txt to the user's working directory. Other protocols, such as ftp, are also available.


1. [Transferring Files to the HPCC](https://wiki.hpcc.msu.edu/display/hpccdocs/Transferring+Files+to+the+HPCC)

------
