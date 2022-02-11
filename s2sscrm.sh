#!/bin/bash
function getdir(){
    for element in `ls $1`
    do  
        dir_or_file=$1"/"$element
        if [ -d $dir_or_file ]
        then 
            getdir $dir_or_file
        else
		if [ "${dir_or_file##*.}"x = "css"x ]||[ "${dir_or_file##*.}"x = "js"x ]||[ "${dir_or_file##*.}"x = "php"x ]||[ "${dir_or_file##*.}"x = "html"x ];then

	grep '芯' $dir_or_file
           sed -i 's/芯芯/山水/' $dir_or_file
#echo $dir_or_file
#	xinxin=`grep "'xinxin_'" $dir_or_file`
#	echo $xinxin
#		if [ $xinxin=='' ]; then
#		  aa='1'
#		else
#		    echo $dir_or_file >>res.txt
#		    echo $xinxin >> res.txt
#		    echo '' >> res.txt
#
#		fi

		fi
        fi  
    done
}
root_dir="/home/html/www/"
getdir $root_dir
