<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $subjectLine ?? 'Notification' }}</title>
    <style type="text/css">
        body { margin: 0; padding: 0; background-color: #f0f2f5; }
        table { border-spacing: 0; }
        td { padding: 0; }
        img { border: 0; display: block; }
        .wrapper { width: 100%; background-color: #f0f2f5; padding: 40px 0; }
        .email-container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        @media only screen and (max-width: 620px) {
            .email-container { width: 94% !important; border-radius: 6px !important; }
            .content-pad { padding: 28px 22px !important; }
            .footer-pad { padding: 28px 22px !important; }
        }
    </style>
</head>
<body>
<div class="wrapper">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
    <td align="center">
        <table class="email-container" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);">

            <!-- ===== HEADER ===== -->
            <tr>
                <td align="center" style="background: linear-gradient(135deg, #0f1923 0%, #1a2e1a 100%); padding: 30px 40px 24px;">
                    <img src="{{ asset('logo.png') }}" alt="Zenbot" width="150" style="display:block;margin:0 auto;" />
                    <div style="margin-top:10px;height:3px;width:50px;background:#24e81a;border-radius:2px;margin-left:auto;margin-right:auto;"></div>
                </td>
            </tr>

            <!-- ===== SUBJECT BANNER ===== -->
            <tr>
                <td style="background:#24e81a;padding:14px 40px;">
                    <p style="margin:0;font-family:Arial,sans-serif;font-size:13px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:#ffffff;">
                        {{ $subjectLine ?? 'Notification' }}
                    </p>
                </td>
            </tr>

            <!-- ===== BODY ===== -->
            <tr>
                <td class="content-pad" style="padding: 40px 40px 32px; background: #ffffff;">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td style="font-family: Arial, sans-serif; font-size: 15px; line-height: 1.8; color: #444444;">
                                {!! nl2br(e($bodyMessage)) !!}
                            </td>
                        </tr>
                        <tr>
                            <td height="24" style="font-size:24px;line-height:24px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #eeeeee; padding-top: 20px; font-family: Arial, sans-serif; font-size: 14px; color: #777777;">
                                Best regards,<br />
                                <strong style="color: #222222;">The Zenbot Team</strong>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- ===== DIVIDER ===== -->
            <tr>
                <td style="height:4px;background:linear-gradient(90deg,#0f1923,#24e81a,#0f1923);"></td>
            </tr>

            <!-- ===== FOOTER ===== -->
            <tr>
                <td class="footer-pad" style="background:#0f1923;padding:32px 40px;">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">

                        <!-- Logo row -->
                        <tr>
                            <td align="center" style="padding-bottom:18px;">
                                <img src="{{ asset('logo.png') }}" alt="Zenbot" width="100" style="display:block;margin:0 auto;opacity:0.85;" />
                            </td>
                        </tr>

                        <!-- Tagline -->
                        <tr>
                            <td align="center" style="padding-bottom:20px;">
                                <p style="margin:0;font-family:Arial,sans-serif;font-size:13px;color:#8ba88b;letter-spacing:0.5px;">
                                    Smart Investing. Real Results.
                                </p>
                            </td>
                        </tr>

                        <!-- Divider -->
                        <tr>
                            <td style="padding-bottom:20px;">
                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td style="height:1px;background:rgba(255,255,255,0.1);"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- Footer links -->
                        <tr>
                            <td align="center" style="padding-bottom:16px;">
                                <table cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td style="padding: 0 10px;">
                                            <a href="#" style="font-family:Arial,sans-serif;font-size:12px;color:#24e81a;text-decoration:none;">Privacy Policy</a>
                                        </td>
                                        <td style="color:#3d5c3d;font-size:12px;">|</td>
                                        <td style="padding: 0 10px;">
                                            <a href="#" style="font-family:Arial,sans-serif;font-size:12px;color:#24e81a;text-decoration:none;">Terms of Service</a>
                                        </td>
                                        <td style="color:#3d5c3d;font-size:12px;">|</td>
                                        <td style="padding: 0 10px;">
                                            <a href="#" style="font-family:Arial,sans-serif;font-size:12px;color:#24e81a;text-decoration:none;">Support</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- Copyright -->
                        <tr>
                            <td align="center">
                                <p style="margin:0;font-family:Arial,sans-serif;font-size:11px;color:#4a664a;line-height:1.7;">
                                    &copy; {{ date('Y') }} Zenbot. All rights reserved.<br />
                                    This email was sent by Zenbot. If you believe you received this in error, please contact our support team.
                                </p>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>

        </table>
    </td>
</tr>
</table>
</div>
</body>
</html>
