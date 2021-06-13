<?php

session()->destroy();

return redirect()->route('auth/login');