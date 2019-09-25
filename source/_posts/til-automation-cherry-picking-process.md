---
extends: _layouts.post
section: content
title: TIL - Automation cherry-picking process
date: 2019-08-19

categories: [til]
description: Git 
---

### Use case

Sometimes, I want to cherry-pick all merge-commit from a branch. For example, I have a feature that has been developing in `feature/xxx` and this branch has been merge to `develop` by multiple PRs.

Now, I want to release this `feature/xxx` to `master`. What should I do ? 

### 1. List out all merge commit from feature branch to develop

I ran the command below to get all the commit hash 

    khanh in ~/project/x on develop > git log --first-parent --oneline | grep feature/xxx
    43501043 Merge pull request #757 feature/573 into develop
    2189c7dd Merge pull request #756 feature/573 into develop
    15196ecd Merge pull request #755 feature/573 into develop
    fa50af01 Merge pull request #735 feature/573 into develop
    b3c729e8 Merge pull request #734 feature/573 into develop
    ec60235e Merge pull request #730 feature/573 into develop
    1c9315ad Merge pull request #725 feature/573 into develop
    9d92b98a Merge pull request #722 feature/573 into develop
    bf8b3f5c Merge pull request #717 feature/573 into develop
    f818f46a Merge pull request #716 feature/573 into develop
    6a257fa6 Merge pull request #715 feature/573 into develop
    c24e194f Merge pull request #712 feature/573 into develop
    89f821df Merge pull request #711 feature/573 into develop
    c0803282 Merge pull request #710 feature/573 into develop
    65dca36f Merge pull request #707 feature/573 into develop

**Note :** To display the merge commit in reverse order, you should 

### 2. Copy the result to a file

Maybe I will save the file as `list_commit.txt`

### 3. Run the command below to cherry-pick each commit in that file

Run the shell script below to cherry-pick all commits in a file ( if there is any conflicts, the command will stop and you should resolve conflicts before continuing.)

    #!/usr/bin/env bash
    
    LIST_FILE="${1}"
    
    if [ "${LIST_FILE}" = "" ] ; then
      echo "Pleas give path to commit list file!"
      echo "Usage: cherry-pick-list <file/to/picklist>"
      exit 1
    fi
    
    echo "Cherry-picking all commits from file ${LIST_FILE} ..."
    
    COUNT=1
    IFS=$'\n'
    for commit in $(cat "${LIST_FILE}") ; do
      hash=$(echo ${commit} | cut -d$'\t' -f 1)
      echo -n "cherry picking ${hash} ... "
      git cherry-pick -m 1 "${hash}"
    
      if [ $? -eq 0 ] ; then
        echo "done."
      else
        echo "There are conflicts to resolve!"
        read -p "Press [ENTER] key if you have resolved the conflicts and to continue ..."
      fi
    
      COUNT=$((COUNT+1))
    done
    
    echo "Maybe you want to rebase: git rebase -i HEAD~${COUNT}"

### 4. Referrals

[https://git-scm.com/docs/git-log](https://git-scm.com/docs/git-log)

[https://github.com/Weltraumschaf/shell-scripts/blob/master/src/git-cherry-pick-list.sh](https://github.com/Weltraumschaf/shell-scripts/blob/master/src/git-cherry-pick-list.sh)