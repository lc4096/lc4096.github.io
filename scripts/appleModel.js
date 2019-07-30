function getiPhoneModel()
{
    // iPhone XR
    if ((window.screen.height / window.screen.width == 896 / 414) && (window.devicePixelRatio == 2))
    {
        return "iPhone XR";
    }

    // iPhone XS Max
    if ((window.screen.height / window.screen.width == 896 / 414) && (window.devicePixelRatio == 3))
    {
        return "iPhone XS Max";
    }

    // iPhone X
    if ((window.screen.height / window.screen.width == 812 / 375) && (window.devicePixelRatio == 3))
    {
        return "iPhone X, XS";
    }

    // iPhone 6+/6s+/7+ and 8+
    else if ((window.screen.height / window.screen.width == 736 / 414) && (window.devicePixelRatio == 3))
    {
        return "iPhone 6 Plus, 6s Plus, 7 Plus or 8 Plus";
    }

    // iPhone 6+/6s+/7+ and 8+ in zoom mode
    else if ((window.screen.height / window.screen.width == 667 / 375) && (window.devicePixelRatio == 3))
    {
        return "iPhone 6 Plus, 6s Plus, 7 Plus ";
    }

    // iPhone 6/6s/7 and 8
    else if ((window.screen.height / window.screen.width == 667 / 375) && (window.devicePixelRatio == 2))
    {
        return "iPhone 6, 6s, 7 or 8";
    }

    // iPhone 5/5C/5s/SE or 6/6s/7 and 8 in zoom mode
    else if ((window.screen.height / window.screen.width == 1.775) && (window.devicePixelRatio == 2))
    {
        return "iPhone 5, 5C, 5S, SE ";
    }

    // iPhone 4/4s
    else if ((window.screen.height / window.screen.width == 1.5) && (window.devicePixelRatio == 2))
    {
        return "iPhone 4 or 4s";
    }

    // iPhone 1/3G/3GS
    else if ((window.screen.height / window.screen.width == 1.5) && (window.devicePixelRatio == 1))
    {
        return "iPhone 1, 3G or 3GS";
    }

    else {
        return "Not an iPhone";
    }
}

// iPad model checks.
function getiPadModel()
{
    if (window.screen.height / window.screen.width == 1024 / 768)
    {
        // iPad, iPad 2, iPad Mini
        if (window.devicePixelRatio == 1)
        {
            return "iPad 1, iPad 2, iPad Mini 1";
        }
        // iPad 3, 4, 5, Mini 2, Mini 3, Mini 4, Air, Air 2, Pro 9.7
        else
        {
            return "iPad 3, iPad 4, iPad 5, iPad Air 1, iPad Air 2, iPad Mini 2, iPad Mini 3, iPad Mini 4, iPad Pro 9.7";
        }
    }
    // iPad Pro 10.5
    else if (window.screen.height / window.screen.width == 1112 / 834)
    {
        return "iPad Pro 10.5";
    }
    // iPad Pro 12.9, Pro 12.9 (2nd Gen)
    else if (window.screen.height / window.screen.width == 1366 / 1024)
    {
        return "iPad Pro 12.9, Pro 12.9 (2nd Gen)";
    }
    // Not an ipad
    else
    {
        return "Not an iPad";
    }
}