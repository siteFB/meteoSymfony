# My first site with Symfony: meteoSymfony <br><br>

Here I use version 6.<br>
I have already prepared a diagram in order to create clear makers.<br><br>

To create my database I directly used Laragon which proposes to create and name a site in Symfony version.<br>
I then installed it in vscode. I installed all necessary requirements for Symfony 6.<br>
The 1st table created corresponds to users and Symfony provides a maker for authentication.<br>
Then "Ephemeride" with the maker:entity. I didn't use Symfony's Mailer because my messaging is internal to the site... Table "Messagerie" includes 2 foreign keys that come from Users: I therefore had to create 2 relationships.<br><br>

// A detail to remember: Not all references are included in the Symfony maker: for this reason I added the CURRENT_TIMESTAMP myself, for example.<br><br>

For this 1st experience with Symfony project, I migrated to each table and I end up with several versions of migrations. Next time, I'll know that it's easier to send all my database in one go so that I only get one version of migrations, at the beginning...<br>
To build the blocks common to all the pages, we use a base to which we refer and we draw from it what we need. If you don't need it, just ignore the block.<br>
Setting up the style in a public folder and accessible with the asset() function. Be careful, no tag in twig: add it yourself to be sure with responsive!<br>
