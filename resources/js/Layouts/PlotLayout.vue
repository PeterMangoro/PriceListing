<template>
  <div class="min-h-screen text-slate-900 bg-wood bg-cover bg-no-repeat">
    <Head :title="title" />

    <!-- <left-sidebar  /> -->

    <jet-banner />
    <nav class="sticky top-0 py-1 bg-blue-charcoal-900 text-slate-100">
      <!-- Primary Navigation Menu -->
      <div class="px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between">
          <div class="flex">
            <!-- Logo -->
            <div class="flex items-center shrink-0">
              <Link :href="route('home')">
                <ApplicationLogo class="block w-auto m-auto" />
                <!-- Home -->
              </Link>
            </div>
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
              <JetNavLink
                class=""
                :href="route('welcome.plots.index')"
                :active="route().current('welcome.plots.index')"
                enter-active-class=""
              >
                Sales
              </JetNavLink>
            </div>
          </div>

          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <!-- <JetNavLink
                class=""
                :href="route('teams.index')"
                :active="route().current('teams.index')"
              >
                Teams
              </JetNavLink> -->
            <JetNavLink
              class=""
              :href="route('plots.create')"
              :active="route().current('plots.create')"
            >
              Upload Your Property
            </JetNavLink>

            <JetNavLink
              class=""
              :href="route('plots.index')"
              :active="route().current('plots.index')"
            >
              Manage Your Property
            </JetNavLink>

            <JetNavLink
              v-if="$page.props.is_SuperAdmin"
              class=""
              :href="route('super.users')"
              :active="route().current('super.users')"
            >
              Admin
            </JetNavLink>

            <!-- Settings Dropdown -->
            <div class="relative ml-3">
              <div v-if="$page.props.user">
                <JetDropdown align="right" width="24">
                  <template #trigger>
                    <button
                      v-if="$page.props.jetstream.managesProfilePhotos"
                      class="
                        flex
                        text-sm
                        transition
                        bg-transparent
                        border-2 border-transparent
                        rounded-full
                        focus:outline-none focus:border-gray-300
                      "
                    >
                      <img
                        class="object-cover w-8 h-8 rounded-full"
                        :src="$page.props.user.profile_photo_url"
                        :alt="$page.props.user.name"
                      />
                    </button>

                    <span v-else class="inline-flex rounded-md">
                      <button
                        type="button"
                        class="
                          inline-flex
                          items-center
                          px-3
                          py-2
                          text-sm
                          font-medium
                          leading-4
                          text-gray-500
                          transition
                          bg-transparent bg-white
                          border border-transparent
                          rounded-md
                          hover:text-gray-700
                          focus:outline-none
                        "
                      >
                        {{ $page.props.user.name }}

                        <svg
                          class="ml-2 -mr-0.5 h-4 w-4"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </button>
                    </span>
                  </template>

                  <template #content>
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                      Manage Account
                    </div>

                    <JetDropdownLink :href="route('profile.show')">
                      Profile
                    </JetDropdownLink>

                    <JetDropdownLink :href="route('dashboard.dashboard')">
                      Dashboard
                    </JetDropdownLink>

                    <JetDropdownLink
                      v-if="$page.props.jetstream.hasApiFeatures"
                      :href="route('api-tokens.index')"
                    >
                      API Tokens
                    </JetDropdownLink>

                    <div class="border-t border-gray-100" />

                    <!-- Authentication -->
                    <form @submit.prevent="logout">
                      <JetDropdownLink as="button"> Log Out </JetDropdownLink>
                    </form>
                  </template>
                </JetDropdown>
              </div>
              <div v-else>
                <Link
                  :href="route('login')"
                  class="
                    flex
                    items-center
                    px-4
                    py-2
                    text-sm
                    font-medium
                    text-white
                    bg-blue-500
                    rounded-md
                    hover:bg-blue-600
                  "
                >
                  Login
                </Link>
              </div>
            </div>
          </div>

          <!-- Hamburger -->
          <div class="flex items-center -mr-2 sm:hidden">
            <button
              class="
                inline-flex
                items-center
                justify-center
                p-2
                text-gray-400
                transition
                rounded-md
                hover:text-gray-500 hover:bg-gray-100
                focus:outline-none focus:bg-gray-100 focus:text-gray-500
              "
              @click="showingNavigationDropdown = !showingNavigationDropdown"
            >
              <svg
                class="w-6 h-6"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  :class="{
                    hidden: showingNavigationDropdown,
                    'inline-flex': !showingNavigationDropdown,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
                <path
                  :class="{
                    hidden: !showingNavigationDropdown,
                    'inline-flex': showingNavigationDropdown,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Responsive Navigation Menu -->
      <div
        :class="{
          block: showingNavigationDropdown,
          hidden: !showingNavigationDropdown,
        }"
        class="sm:hidden"
      >
        <div class="pt-2 pb-3 space-y-1">
          <JetResponsiveNavLink
            class=""
            :href="route('welcome.plots.index')"
            :active="route().current('welcome.plots.index')"
          >
            Sales
          </JetResponsiveNavLink>

          <!-- <JetResponsiveNavLink
              class=""
              :href="route('teams.index')"
              :active="route().current('teams.index')"
            >
              Team
            </JetResponsiveNavLink> -->
          <JetResponsiveNavLink
            v-if="$page.props.is_SuperAdmin"
            class=""
            :href="route('super.users')"
            :active="route().current('super.users')"
          >
            Admin
          </JetResponsiveNavLink>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
          <div class="flex items-center px-4" v-if="$page.props.user">
            <div
              v-if="$page.props.jetstream.managesProfilePhotos"
              class="mr-3 shrink-0"
            >
              <img
                class="object-cover w-10 h-10 rounded-full"
                :src="$page.props.user.profile_photo_url"
                :alt="$page.props.user.name"
              />
            </div>

            <div>
              <div class="text-base font-medium text-gray-800">
                {{ $page.props.user.name }}
              </div>
              <div class="text-sm font-medium text-gray-500">
                {{ $page.props.user.email }}
              </div>
            </div>
          </div>

          <div class="mt-3 space-y-1">
            <JetResponsiveNavLink
              :href="route('profile.show')"
              :active="route().current('profile.show')"
            >
              Profile
            </JetResponsiveNavLink>

            <JetResponsiveNavLink
              :href="route('dashboard.dashboard')"
              :active="route().current('dashboard.dashboard')"
            >
              Dashboard
            </JetResponsiveNavLink>

            <JetResponsiveNavLink
              v-if="$page.props.jetstream.hasApiFeatures"
              :href="route('api-tokens.index')"
              :active="route().current('api-tokens.index')"
            >
              API Tokens
            </JetResponsiveNavLink>

            <!-- Authentication -->
            <form method="POST" @submit.prevent="logout">
              <JetResponsiveNavLink as="button"> Log Out </JetResponsiveNavLink>
            </form>

            <!-- Team Management -->
            <template v-if="$page.props.jetstream.hasTeamFeatures">
              <div class="border-t border-gray-200" />

              <div class="block px-4 py-2 text-xs text-gray-400">
                Manage Team
              </div>

              <!-- Team Settings -->
              <JetResponsiveNavLink
                :href="route('teams.show', $page.props.user.current_team)"
                :active="route().current('teams.show')"
              >
                Team Settings
              </JetResponsiveNavLink>

              <JetResponsiveNavLink
                v-if="$page.props.jetstream.canCreateTeams"
                :href="route('teams.create')"
                :active="route().current('teams.create')"
              >
                Create New Team
              </JetResponsiveNavLink>

              <div class="border-t border-gray-200" />

              <!-- Team Switcher -->
              <div class="block px-4 py-2 text-xs text-gray-400">
                Switch Teams
              </div>

              <template
                v-for="team in $page.props.user.all_teams"
                :key="team.id"
              >
                <form @submit.prevent="switchToTeam(team)">
                  <JetResponsiveNavLink as="button">
                    <div class="flex items-center">
                      <svg
                        v-if="team.id == $page.props.user.current_team_id"
                        class="w-5 h-5 mr-2 text-green-400"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                      <div>{{ team.name }}</div>
                    </div>
                  </JetResponsiveNavLink>
                </form>
              </template>
            </template>
          </div>
        </div>
      </div>
    </nav>

    <!-- Page Heading -->
    <header v-if="$slots.header" class="mb-2 shadow">
      <div class="px-4 py-6 mx-auto sm:px-6 lg:px-8">
        <slot name="header" />
      </div>
    </header>

    <!-- Page Content -->
    <main class=" px-6">
      <slot />
    </main>
  </div>

  <!-- <footer-nav  /> -->

  <footer-nav />
</template>

<script setup>
import { ref } from "vue";

import { Head, Link, router } from "@inertiajs/vue3";
import JetBanner from "@/Components/Banner.vue";
import JetDropdown from "@/Components/Dropdown.vue";
import JetDropdownLink from "@/Components/DropdownLink.vue";
import JetNavLink from "@/Components/NavLink.vue";
import JetResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import footerNav from "@/Components/Footer/footer.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

defineProps({
  title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
  route.put(
    route("current-team.update"),
    {
      team_id: team.id,
    },
    {
      preserveState: false,
    }
  );
};

const logout = () => {
  route.post(route("logout"));
};

function show_search() {
  show.value = true;
}
</script>

// pwa

<script>
</script>
