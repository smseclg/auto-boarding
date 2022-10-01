# Auto-Boarding
Automate the Boarding functionalities

Installing the GIT Client on Cent OS
	[root@py-docker php]# yum install git

Check the GIT Installaion
	[root@py-docker php]# git --version
		git version 1.8.3.1

Creating the file on GITHUB
	info.php
	Dockerfile

Clone the code from the remote repository
	[root@py-docker boarding-prj]# git clone https://github.com/smseclg/auto-boarding.git
		Cloning into 'auto-boarding'...
		remote: Enumerating objects: 12, done.
		remote: Counting objects: 100% (12/12), done.
		remote: Compressing objects: 100% (9/9), done.
		remote: Total 12 (delta 0), reused 0 (delta 0), pack-reused 0
		Unpacking objects: 100% (12/12), done.

Configure the GIT Client 
	git config --global user.name 'smseclg'
	git config --global user.email 'smseclg@gmail.com'

Check the configurations
	[root@py-docker boarding-prj]# git config --list
		user.name=smseclg
		user.email=smseclg@gmail.com
