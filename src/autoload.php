<?php

foreach (glob("../src/helper/*.php") as $filename)
{
    include $filename;
}
