# PacificMUN-IPC
International Press Corps committee of PacificMUN 2020. Very very simple CMS article system

Created from scratch within 24 hours. Could have been more efficient and set up a wordpress website, but I've always wanted to try to create a news website w a CMS

Live version can be found at http://ipc.pacificmun.org

Actual pages:
 - Home page
 - News Agency page
 - Article page
 - Login/Post article page
 - Edit article page
 
Features:
  - Post an article
  - Edit article
  - Image (have to manually (1) upload to server and (2) insert the name of the file into the respective column in the Articles table)
  
Notes:
Unsecure... haven't tested out xss scenarios via the form inputs... the article page spits out the contents of the "body" column as an HTML. Didn't think that would be an issue since the "post article" feature would only be available for the Dais team that wouldn't know any of those, nor would be actively malevolent to try to break the site. Also, time constraint.
