---
deployment:
  tasks:
    - export DEPLOYPATH=/home/user/public_html/
    - /bin/cp index.html $DEPLOYPATH