<x-layout.app>

    <x-pages.insight.show.main
        :topic="$topic"
    />

    <x-pages.insight.show.main-ideas
        :topic="$topic"
    />

    <x-pages.insight.show.topic
        :topic="$topic"
    />

    <x-layout.newsletter />

    <x-pages.insight.show.may-like
        :similarTopics="$similarTopics"
    />

</x-layout.app>
