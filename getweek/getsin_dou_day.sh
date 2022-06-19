#! /bin/sh
source ./getweek.sh
week(){
todaystr=$1
today=`expr $todaystr + 0`
echo "today is $today!"
let aa=7-$kk
 
sw=`expr 1 + $aa`
a=`expr $sw + 7`
b=`expr $sw + 14`
c=`expr $sw + 21`
d=`expr $sw + 28`
e=`expr $sw + 31`
echo $todayi

if [ $today -gt $sw ]&&[ $today -le $a ]
then
echo "--------------d1"
elif [ $today -gt $a ]&&[ $today -le $b ]
then
echo "--------------s2"
elif [ $today -gt $c ]&&[ $today -le $d ]
then
echo "--------------d2"
elif [ $today -gt $d ]&&[ $today -le $e ]
then
echo "--------------s3"
else
echo "--------------s1---------------"
fi
}
int=1
while(( $int<=31 ))
do
    echo $int
week $int
    let "int++"
done

