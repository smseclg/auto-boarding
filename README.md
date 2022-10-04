# Auto-Boarding
Automate the Boarding functionalities

Code - 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

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

Sync the Changes to the remote Repository

	[root@py-docker auto-boarding]# git remote -v
		origin  https://github.com/smseclg/auto-boarding.git (fetch)
		origin  https://github.com/smseclg/auto-boarding.git (push)

	[root@py-docker auto-boarding]# git push origin main
		Username for 'https://github.com': smseclg
		Password for 'https://smseclg@github.com':
			Counting objects: 5, done.
			Delta compression using up to 2 threads.
			Compressing objects: 100% (3/3), done.
			Writing objects: 100% (3/3), 740 bytes | 0 bytes/s, done.
			Total 3 (delta 0), reused 0 (delta 0)
			To https://github.com/smseclg/auto-boarding.git
   			d7cc2a6..0f54189  main -> main

How to CHECKOUT the CODE from the REPO to LOCAL PC 

	[root@py-docker auto-boarding]# pwd
		/root/boarding-prj/auto-boarding
		
	[root@py-docker auto-boarding]# ll
		total 16
		-rw-r--r--. 1 root root    1 Oct  4 14:00 docker-compose.yml
		-rw-r--r--. 1 root root  533 Oct  4 14:00 Dockerfile
		-rw-r--r--. 1 root root   19 Oct  1 10:42 info.php
		-rw-r--r--. 1 root root 1645 Oct  1 11:50 README.md
	
	[root@py-docker auto-boarding]# git pull https://github.com/smseclg/auto-boarding.git
		remote: Enumerating objects: 8, done.
		remote: Counting objects: 100% (8/8), done.
		remote: Compressing objects: 100% (5/5), done.
		remote: Total 6 (delta 1), reused 0 (delta 0), pack-reused 0
		Unpacking objects: 100% (6/6), done.
		From https://github.com/smseclg/auto-boarding
 		* branch            HEAD       -> FETCH_HEAD
		Updating 94356ad..d557fdc
		Fast-forward
 		Dockerfile         | 4 +++-
 		docker-compose.yml | 1 +
 		2 files changed, 4 insertions(+), 1 deletion(-)
 		create mode 100644 docker-compose.yml

		

