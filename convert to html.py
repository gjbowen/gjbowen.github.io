import re

import os

def main():

    getFileName()

    print("done")


def getHeader():
    if "header.php" in os.listdir():
        header = open("header.php",'rt')
        header= header.read()
        header = header.replace(".php",".html")
        return header
def getSidebar():
    if "sidebar.php" in os.listdir():
        sidebar = open("sidebar.php",'rt')
        sidebar= sidebar.read()
        sidebar = sidebar.replace("<!DOCTYPE html>","")
        sidebar = sidebar.replace("<link href=""\"style.css""\" rel=""\"stylesheet""\" type=""\"text/css""\">","")
        sidebar = sidebar.replace(".php",".html")
        return sidebar
def getFooter():
    if "footer.php" in os.listdir():
        footer = open("footer.php",'rt')
        footer= footer.read()
        footer = footer.replace("<!DOCTYPE html>","")
        footer = footer.replace("<link href=""\"style.css""\" rel=""\"stylesheet""\" type=""\"text/css""\">","")
        footer = footer.replace(".php",".html")
        return footer
def getFileName():
    count=0
    files=dict()
    
    for i in os.listdir():
        
        header = getHeader()
        footer = getFooter()
        sidebar = getSidebar()
        if i.endswith('.php') and i!="ip.php" and i!="404.php" and i!="header.php" and i!="sidebar.php" and i!="footer.php":
            newFile = i.replace(".php",".html")
            print("new file to be created: ", newFile)
            newFile = open(newFile, 'wt')
            with open(i) as f:
                newFile.write(header)
                newFile.write(sidebar)
                php=False
                for line in f:
                    
                    if "<?php" in line:
                        line = line.replace("<?php","")
                        php=True
                    if "?>" in line:
                        line = line.replace("?>","")
                        php =False
                    if "include" in line and php == True:
                        if "sidebar" in line:
                            line=sidebar
                        if "header" in line:
                            line=header
                        if "footer" in line:
                            line=footer
                        if "ip.php" in line:
                            line=""
                        
                    if php == True: #ignore php
                        pass
                    else:
                        
                        line = line.replace(".php",".html")
                        newFile.write(str(line))
                newFile.write(footer)
                newFile.close()

def processLine():
    pass
main()
