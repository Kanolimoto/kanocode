#!/bin/sh

# www.jquerycn.cn
get_week()
{
year=`expr substr  $1 1 4`
month=`expr substr  $1 5 2`
day=`expr substr  $1 7 2`
b=`cal $month $year|wc -l`
b=`expr $b - 1`
week_day=`cal $month $year |awk '{for(i=1;i<=NF;i++){if($i=='$day'){if (NR=='$b'-1){print i-1}else{print 7-NF+i-1}}}}'`
case `expr $week_day + 1` in
1) week_day_name=07 ;;
2) week_day_name=01 ;;
3) week_day_name=02 ;;
4) week_day_name=03 ;;
5) week_day_name=04 ;;
6) week_day_name=05 ;;
7) week_day_name=06 ;;
*) week_day_name= 'wrong date' ;;
esac
echo $week_day_name
}


l_date=`date +%Y%m01`

kk=`get_week ${l_date}`

echo $kk
