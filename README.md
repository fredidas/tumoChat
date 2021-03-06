# TUMO Chat  
  
## What is TUMO  
  
The TUMO Center for Creative Technologies is a free-of-charge educational program that puts teens in charge of their own learning. Its learning process is made up of self-learning activities, workshops, and project labs that revolve around 14 learning targets.  
  
> And this project named **TUMO chat** is one of the projects that was made during one of these labs (*Your social networking site role model*).  
  
## Who worked on this project  
  
- This chat was designed in France and programmed in Armenia.  
  
- The workshop leader was *David Tchilian*.  
  
- There were two teams working on this project.  
> The first team was the students from France.  
> There were around 15 students working on this project.  
> They designed the chat.  
  
> The second team was the students from Armenia.  
> There were around 20 students working on this project.  
> They programmed the chat and added new features.  
  
## Why this TUMO chat was designed  
  
It was created for Tumo students and workers by Tumo students to make communication easier, fun, enjoyable, and Tumo style. It is also a great way to find and make new friends.
  
## What features TUMO chat has

- The first feature is the groups that everyone who enters **TUMO chat** can join. These groups are called **community chats**. They are divided into the 14 learning targets that TUMO has. This feature allows users to find other students with the same interests where they can share ideas, communicate or help each other out when they are in the same lab or workshop.

-   The second feature is direct messaging. Via  **DMs**  you can communicate privately with whoever you want.

-  As well as there is a feature called **streak**. It is a small prize for you when you communicate with someone for a few days in a row. The **streaks** look like different types of stars and each of them defines a bigger score. You get the first star after 5 days of consecutive communication. The following stars that you get are within the range of 10 days that you communicate. The biggest score that you can receive is a galaxy and you get it after 60 days of communication.

- Also in **TUMO chat** there are special stickers that are related to TUMO and emojis designed as animals.

## How does TUMO chat work

- The first thing that you have to do is to log in by entering your email and password.

- Then choose a profile picture from the given ones and write a small bio.

- Now you are ready to communicate, make groups, talk in DMs and enjoy your time in **TUMO Chat**.

# TUMO Chat Installation

You're also able to run this awesome project on your own machine.

## Requirements

- PHP 8
- MySQL 5
- Apache 
- NodeJS 13+

## Installation

Please Note
The configuration file is located at `site/config/config.php`, configure everything you need for TUMO Chat from here.

1. Clone the repository.

```
$ git clone https://github.com/fredidas/tumoChat.git
```

2. Setup the Apache server and set the root of it to `tumoChat`.

3. Create a database and name it `tumoChat` then get the `database.sql` file and import it to the MySQL database.

4. Change your working directory to the `socket-server` folder, and run the `npm install` command.

5. Run the `npm start` command to start the WebSocket server.

6. Done, TUMO Chat is ready to use.
