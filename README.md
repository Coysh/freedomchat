Freedom Chat
===========

A secure ephemeral OTR chat website. Created during the Cardiff University Computer Science Society Cyber Security Makespace - a two day event over the 8th/9th February 2014.

This project is a collaboration between Tim Coysh, Brendan Warren and Remi Stevens

A working demo can be found at http://www.freedomchat.timcoysh.co.uk/ 

How It Works
===========
Freedom Chat uses a combination of PHP and jQuery to send and receive messages.

When messages are sent, they are stored in a database, along with the unique key chosen by the user.

The receiving user's client then polls the server and retrieves the message. The client uses the the inputted key to decrypt the message.

Currently all of the encryption is done using TripleDES method. The chat system uses the CryptoJS library to encrypt and decrypt messages(https://code.google.com/p/crypto-js/). All encyption is done client-side, not server-side.

Installation
===========
Freedom Chat is designed to run out-of-the-box. Installation should be fairly simple.
- Create a database, and run the 'makespace.sql' SQL code in it. Delete makespace.sql after use.
- Edit CGI-BIN/connect.php and enter in your database details.
- Upload all files to your server.
- Enjoy!

To-Do
===========
Development of Freedom Chat is still ongoing. Below is a list of planned features for the future
- Add sound on new message
- Add choice of user encryption