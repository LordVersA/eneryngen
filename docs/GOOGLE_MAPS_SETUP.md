# Google Maps API Setup Instructions

## Overview

This guide will help you obtain and configure a Google Maps API key for the OPC Energy website's Global Reach interactive map feature.

## Step 1: Create a Google Cloud Project

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Sign in with your Google account
3. Click "Select a project" at the top of the page
4. Click "New Project" button
5. Enter project name: **"OPC Energy Website"**
6. Click "Create" and wait for the project to be created

## Step 2: Enable Google Maps JavaScript API

1. In the Google Cloud Console, navigate to **"APIs & Services"** → **"Library"**
2. In the search bar, type: **"Maps JavaScript API"**
3. Click on **"Maps JavaScript API"** from the results
4. Click the **"Enable"** button
5. Wait for the API to be enabled (this may take a few moments)

## Step 3: Create API Credentials

1. Go to **"APIs & Services"** → **"Credentials"**
2. Click **"Create Credentials"** at the top
3. Select **"API Key"** from the dropdown
4. Your API key will be generated and displayed
5. **Copy the API key** (you'll need this later)
6. Click **"Restrict Key"** (IMPORTANT for security)

## Step 4: Restrict Your API Key

### Application Restrictions

1. Under **"Application restrictions"**, select **"HTTP referrers (web sites)"**
2. Click **"Add an item"** under "Website restrictions"
3. Add your allowed domains:
   ```
   https://yourdomain.com/*
   https://www.yourdomain.com/*
   ```
4. For local development, also add:
   ```
   http://localhost/*
   http://127.0.0.1/*
   ```

### API Restrictions

1. Under **"API restrictions"**, select **"Restrict key"**
2. From the dropdown, select **"Maps JavaScript API"**
3. Click **"Save"** at the bottom

## Step 5: Add API Key to Your Project

1. Open your project's `.env` file
2. Add the following line (replace `your_api_key_here` with your actual API key):
   ```env
   GOOGLE_MAPS_API_KEY=your_api_key_here
   ```
3. Save the `.env` file

**Example:**
```env
GOOGLE_MAPS_API_KEY=AIzaSyBXXXXXXXXXXXXXXXXXXXXXXXXXXXX
```

## Step 6: Configure Billing (Required)

Google Maps requires a billing account, but provides **$200 free credit per month**.

1. Go to **"Billing"** in Google Cloud Console
2. Click **"Link a billing account"**
3. Follow the prompts to set up billing
   - You'll need to provide credit card information
   - You won't be charged unless you exceed the free tier

### Free Tier Limits

- **$200 free credit per month** (more than enough for most websites)
- **Map Loads:** First 28,000 loads are free each month
- **Dynamic Maps:** $7 per 1,000 loads after free tier

**Most websites stay well within the free tier and never get charged.**

## Step 7: Set Up Budget Alerts (Recommended)

To ensure you're never surprised by charges:

1. Go to **"Billing"** → **"Budgets & alerts"**
2. Click **"Create Budget"**
3. Set budget amount to **$50** (or your preferred limit)
4. Configure email alerts at 50%, 90%, and 100% of budget
5. Click **"Finish"**

## Security Best Practices

### 1. Never Commit API Keys to Git

Your `.env` file should already be in `.gitignore`. Verify this:

```bash
cat .gitignore | grep .env
```

You should see `.env` listed.

### 2. Use HTTP Referrer Restrictions

Always restrict your API key to specific domains. Never use an unrestricted key in production.

### 3. Monitor Usage

Regularly check your API usage:

1. Go to **"APIs & Services"** → **"Dashboard"**
2. Click on **"Maps JavaScript API"**
3. View usage graphs and metrics

### 4. Rotate Keys Regularly

For maximum security:

1. Create a new API key every 6-12 months
2. Update your `.env` file with the new key
3. Delete the old key from Google Cloud Console

## Testing Your Setup

After completing the setup:

1. Clear your browser cache
2. Visit your website
3. Navigate to the "Global Reach" section
4. The map should load showing markers for London and Muscat

### Expected Behavior

- ✅ Map loads with custom styling
- ✅ Markers appear in London and Muscat
- ✅ Clicking markers shows info windows
- ✅ No console errors

## Troubleshooting

### Error: "This page can't load Google Maps correctly"

**Cause:** API key is invalid or not configured

**Solution:**
1. Verify the API key is correct in `.env`
2. Clear Laravel's config cache: `php artisan config:clear`
3. Reload the page

### Error: "Google Maps Platform rejected your request"

**Cause:** Domain restrictions don't match your current domain

**Solution:**
1. Go to Google Cloud Console → Credentials
2. Edit your API key
3. Add the current domain to HTTP referrer restrictions
4. Save changes

### Map Doesn't Load (No Error)

**Cause:** JavaScript error or billing not enabled

**Solution:**
1. Open browser dev tools (F12)
2. Check Console tab for JavaScript errors
3. Verify billing is enabled in Google Cloud Console
4. Ensure the API is enabled

### Markers Don't Appear

**Cause:** Database not seeded or locations are inactive

**Solution:**
1. Run seeders: `php artisan db:seed`
2. Check Filament admin panel → Map Locations
3. Ensure locations have "Active" toggle enabled

### Map Shows on Localhost but Not Production

**Cause:** HTTP referrer restrictions

**Solution:**
1. Add your production domain to API key restrictions
2. Save changes
3. Wait 5 minutes for changes to propagate

## Getting Help

### Google Maps Documentation

- [Maps JavaScript API Documentation](https://developers.google.com/maps/documentation/javascript)
- [API Key Best Practices](https://developers.google.com/maps/api-security-best-practices)

### Stack Overflow

Search or ask questions with the tag:
- [`google-maps`](https://stackoverflow.com/questions/tagged/google-maps)

### OPC Support

Contact your development team if you encounter issues specific to this implementation.

## Cost Estimates

### Typical Website Usage

For a business website with moderate traffic:

- **Monthly visitors:** 10,000
- **Map loads per visitor:** 1
- **Total map loads:** 10,000/month
- **Cost:** $0 (well within free tier)

### High Traffic Scenario

For a high-traffic website:

- **Monthly visitors:** 100,000
- **Map loads per visitor:** 1
- **Total map loads:** 100,000/month
- **Free tier:** 28,000 loads
- **Billable loads:** 72,000
- **Cost:** ~$50/month

**Most websites stay within the $200 free credit.**

## Summary Checklist

Before going live, verify:

- [ ] Google Cloud project created
- [ ] Maps JavaScript API enabled
- [ ] API key created and restricted
- [ ] Billing account linked
- [ ] Budget alerts configured
- [ ] API key added to `.env`
- [ ] HTTP referrer restrictions set for production domain
- [ ] Map tested on production environment
- [ ] Usage monitoring set up

---

**Last Updated:** December 2025
**Version:** 1.0
