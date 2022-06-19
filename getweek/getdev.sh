#! /bin/bash

dev=$(df | awk '/dev*/{print $0}' | awk 'NR==2{print}')

echo $dev

s1="00,01,00,01"
s2="00,00,00,00"
s3="01,00,00,01"
sa=($s1 $s2 $s3)
x=0
while (($x < 3))
do
cc="${sa[$x]}--------"

if [ $x -eq 2 ]
then
bin=$(echo $cc | sed 's/,/ /g')
fi
let 'x++'

done


echo "Get $bin!"
str=SN000000000000160209
snlast=${str:19}
modsn=$(($snlast%4))
echo $modsn
